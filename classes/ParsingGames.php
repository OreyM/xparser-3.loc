<?php

class ParsingGames extends Parsing{

    private $pageElements;
    private $columnDatabase;

    public function setPageElements(array $pageElements){
        $this->pageElements = $pageElements;
    }
    
    public function setDatabaseColumn(array $data){
        $this->columnDatabase = $data;
    }
    private function clearPriceData($rawPriceData, $country = NULL){

        $finePriceData = htmlentities($rawPriceData);
        $finePriceData = preg_replace('/[^0-9,.]/', '', $rawPriceData);

        if($country === 'RU_RU' || $country === 'DE_DE' || $country === 'NB_NO' || $country === 'CS_CZ'
                                || $country === 'PT_BR' || $country === 'TR_TR' || $country === 'EN_ZA'
                                || $country === 'PL_PL')
        $finePriceData = str_replace(',', '.', $finePriceData);

        if($country === 'ES_AR' || $country === 'ES_CO' || $country === 'ES_CL' || $country === 'DA_DK'){
            $finePriceData = str_replace('.', '', $finePriceData);
            $finePriceData = str_replace(',', '.', $finePriceData);
        }

        if($country === 'ES_MX' || $country === 'KO_KR' || $country === 'JA_JP' || $country === 'EN_IN'
                                || $country === 'ZH_TW')
            $finePriceData = str_replace(',', '', $finePriceData);

        $finePriceData = (float)$finePriceData;

        return $finePriceData;
    }

    private function getValueFromFreePrice($productLink, $country = ''){
        $elementParsing = phpQuery::newDocument($this->curl->get_page($productLink));

        return $this->clearPriceData(($elementParsing->find('.price-info .c-price .srv_price span')->text()), $country);
    }

    private function setDiscountPrice(phpQueryObject $parsingData){
        if(htmlentities($parsingData->find($this->pageElements['goldElement'])->attr('alt')) === 'Gold')
            $productDiscount = 'G';
        elseif(htmlentities($parsingData->find($this->pageElements['eaElement'])->text()) === 'EA Access')
            $productDiscount = 'A';
        elseif(htmlentities($parsingData->find($this->pageElements['discountElement'])->text()))
            $productDiscount = 'D';
        elseif(htmlentities($parsingData->find($this->pageElements['gamePassElement'])->attr('alt')) === 'GamePass')
            $productDiscount = 'P';
        else
            $productDiscount = '';

        return $productDiscount;
    }

    private function getGameImage($productLink, $productID, $productTitle){
        $elementParsing = phpQuery::newDocument($this->curl->get_page($productLink));

        $img_element = $elementParsing->find($this->pageElements['imageElement'])->attr('src');
        $test_img_element = substr($img_element, -3);

        if($test_img_element === 'jpg'){
            $path = '../images/game_new_img/'.$productID.'.jpg';
            file_put_contents($path, file_get_contents($img_element));
            echo "
            <div class='container'>
                <div class=\"alert alert-success\" role=\"alert\">
                    A new image for <strong>{$productTitle}</strong> ---- Game ID - <strong>{$productID}</strong> ---- <a href='{$productLink}'>Game Link</a>
                </div>
            </div>
            ";
        }
        else{
            echo "
                <div class='container'>
                    <div class=\"alert alert-danger\" role=\"alert\">
                        WARNING! Can't get a image! <strong>{$productTitle}</strong> ---- Game ID - <strong>{$productID}</strong> ---- <a href='{$productLink}'>Game Link</a>
                    </div>
                </div>
            ";
        }
    }

    public function addFirstParsingElement(mysqli $dbConnection, $mainUrl, $currentUrl){
        $checkCorrectUrl = substr($currentUrl, -2);

        if($checkCorrectUrl != -1){
            $elementParsing = $this->phpQueryConnection($this->curl, $mainUrl.$currentUrl);

            foreach ($elementParsing->find($this->pageElements['fullPage']) as $parsingData){
                $parsingData = pq($parsingData);          // phpQuery wrapper

                $productLink = $mainUrl.($parsingData->find('> a')->attr('href'));
                $this->columnDatabase['EN_US_GAME_LINK'] = $productLink;

                $productID = substr($productLink, -12);
                $this->columnDatabase['GAME_ID'] = $productID;

                $productTitle = $parsingData->find($this->pageElements['titleElement'])->text();
                $this->columnDatabase['EN_US_GAME_NAME'] = $productTitle;

                $productPrice = $this->clearPriceData($parsingData->find($this->pageElements['priceElement'])->text());
                // Parsing game whose price is 0
                if(empty($productPrice)){
                    $this->columnDatabase['FREE_GAME'] = 1;
                    $productPrice = $this->getValueFromFreePrice($productLink);
                }
                $this->columnDatabase['EN_US_GAME_PRICE'] = $productPrice;

                $productDiscount = $this->setDiscountPrice($parsingData);
                $this->columnDatabase['EN_US_DISC'] = $productDiscount;

                // Get images for game
                $filename = '../images/game_img/'.$productID.'.jpg';
                if (!file_exists($filename))
                    $this->getGameImage($productLink, $productID, $productTitle);
                
                DatabaseConnect::checkConnectionDatabase()->insertData($dbConnection, TABLE, $this->columnDatabase);
                $this->columnDatabase['FREE_GAME'] = 0;
            }

            $nextPageUrl = $elementParsing->find('.m-pagination > .f-active')->next('')->find('a')->attr('href');
            $this->addFirstParsingElement($dbConnection, $mainUrl, $nextPageUrl);
        }
    }

    public function addRestParsingElement(mysqli $dbConnection, $mainUrl, $currentUrl, $country, array $currency){
        $checkCorrectUrl = substr($currentUrl, -2);
        if($checkCorrectUrl != -1) {
            $elementParsing = $this->phpQueryConnection($this->curl, $mainUrl.$currentUrl);

            foreach ($elementParsing->find($this->pageElements['fullPage']) as $parsingData) {
                $parsingData = pq($parsingData);          // phpQuery wrapper

                $productLink = $mainUrl.($parsingData->find('> a')->attr('href'));
                $this->columnDatabase[$country.'_GAME_LINK'] = $productLink;

                $productID = substr($productLink, -12);

                $productPrice = $this->clearPriceData($parsingData->find($this->pageElements['priceElement'])->text(), $country);
                if(empty($productPrice))
                    $productPrice = $this->getValueFromFreePrice($productLink, $country);

                $productPrice = $productPrice * $currency[$country];
                $this->columnDatabase[$country.'_GAME_PRICE'] = $productPrice;

                DatabaseConnect::checkConnectionDatabase()->updateData($dbConnection, TABLE, $productID, $this->columnDatabase);
            }

            $nextPageUrl = $elementParsing->find('.m-pagination > .f-active')->next('')->find('a')->attr('href');
            $this->addRestParsingElement($dbConnection, $mainUrl, $nextPageUrl, $country, $currency);
        }
    }
}