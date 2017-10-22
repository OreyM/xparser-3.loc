<?php
class ParsingCurrency extends Parsing{
    
    public function moneyParsing($currencyUrl, $mainDOMElement){
        $elementParsing = $this->phpQueryConnection($this->curl, $currencyUrl);

        $currency = pq($elementParsing->find($mainDOMElement));

        $currencyData = array(
            'ES_AR' => (float)$currency->find('.pure-table:eq(0) tbody tr:eq(0) td:eq(4)')->text(),
            'EN_AU' => (float)$currency->find('.pure-table:eq(3) tbody tr:eq(0) td:eq(4)')->text(),
            'PT_BR' => (float)$currency->find('.pure-table:eq(0) tbody tr:eq(7) td:eq(4)')->text(),
            'EN_CA' => (float)$currency->find('.pure-table:eq(0) tbody tr:eq(8) td:eq(4)')->text(),
            'ES_CL' => (float)$currency->find('.pure-table:eq(0) tbody tr:eq(10) td:eq(4)')->text(),
            'ES_CO' => (float)$currency->find('.pure-table:eq(0) tbody tr:eq(11) td:eq(4)')->text(),
            'CS_CZ' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(5) td:eq(4)')->text(),
            'DA_DK' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(7) td:eq(4)')->text(),
            'DE_DE' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(6) td:eq(4)')->text(),
            'EN_GB' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(1) td:eq(4)')->text(),
            'JA_JP' => (float)$currency->find('.pure-table:eq(1) tbody tr:eq(9) td:eq(4)')->text(),
            'EN_HK' => (float)$currency->find('.pure-table:eq(1) tbody tr:eq(6) td:eq(4)')->text(),
            'HU_HU' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(9) td:eq(4)')->text(),
            'EN_IN' => (float)$currency->find('.pure-table:eq(1) tbody tr:eq(8) td:eq(4)')->text(),
            'EN_IL' => (float)$currency->find('.pure-table:eq(3) tbody tr:eq(5) td:eq(4)')->text(),
            'ES_MX' => (float)$currency->find('.pure-table:eq(0) tbody tr:eq(22) td:eq(4)')->text(),
            'EN_NZ' => (float)$currency->find('.pure-table:eq(3) tbody tr:eq(10) td:eq(4)')->text(),
            'NB_NO' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(15) td:eq(4)')->text(),
            'PL_PL' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(16) td:eq(4)')->text(),
            'RU_RU' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(18) td:eq(4)')->text(),
            'EN_SG' => (float)$currency->find('.pure-table:eq(1) tbody tr:eq(23) td:eq(4)')->text(),
            'EN_ZA' => (float)$currency->find('.pure-table:eq(4) tbody tr:eq(27) td:eq(4)')->text(),
            'DE_CH' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(19) td:eq(4)')->text(),
            'TR_TR' => (float)$currency->find('.pure-table:eq(2) tbody tr:eq(22) td:eq(4)')->text(),
            'KO_KR' => (float)$currency->find('.pure-table:eq(1) tbody tr:eq(10) td:eq(4)')->text(),
            'ZH_TW' => (float)$currency->find('.pure-table:eq(1) tbody tr:eq(27) td:eq(4)')->text()
        );
        
        return $currencyData;
    }
}