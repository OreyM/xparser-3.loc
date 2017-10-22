<?php
$start = microtime(true);
require_once 'config.php';
?>
<br>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parsing games data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>

<?php

###########################################
############ CONNECT TO DATABASE ##########
###########################################
$connectDatabase = DatabaseConnect::checkConnectionDatabase();
$db = $connectDatabase->connectDatabase();

//Clear table of Database
$connectDatabase->truncateTable($db, TABLE);


###########################################
############# PARSING CURRENCY ############
###########################################
$currencyUrl = 'http://ru.fxexchangerate.com/currency-exchange-rates.html';
$mainDOMElement = '.fx-top';
//Get currency data
$money = new ParsingCurrency();
$getCurrency = $money->moneyParsing($currencyUrl, $mainDOMElement);


###########################################
############## PARSING GAMES ##############
###########################################
// settings data
$game = new ParsingGames();
static $siteUrl = 'https://www.microsoft.com';

//Set page elements for games data parsing
$pageElements = array(
    'fullPage'         => '.context-list-page .m-product-placement-item',
    'titleElement'     => '.c-heading',
    'priceElement'     => '.c-price span[itemprop="price"]',
    'newPriceElement'  => '.price-info .c-price .srv_price span',
    'imageElement'     => '.srv_appHeaderBoxArt > img',
    'goldElement'      => '.c-price span img',
    'eaElement'        => '.c-price > span:last',
    'gamePassElement'  => '.c-price span img',
    'discountElement'  => '.c-price > s'
);
$game->setPageElements($pageElements);

# USA Store Parsing
echo "
<div class=\"container\">
    <div class=\"alert alert-secondary\" role=\"alert\">
        Start parsing from <strong>USA and OAE</strong> country
    </div>
</div>
";
$currentUrl = '/en-us/store/top-paid/games/xbox';
$databaseData = array(
    'GAME_ID' 			=> NULL,
    'EN_US_GAME_NAME' 	=> NULL,
    'EN_US_GAME_PRICE' 	=> NULL,
    'EN_US_GAME_LINK' 	=> NULL,
    'EN_US_DISC'		=> NULL,
    'FREE_GAME'			=> 0
);
$game->setDatabaseColumn($databaseData);
$game->addFirstParsingElement($db, $siteUrl, $currentUrl);

#Argentina Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Argentina</strong> country
        </div>
</div>
";
$currentUrl = '/es-ar/store/top-paid/games/xbox';
$country = 'ES_AR';
$databaseData = array(
    'ES_AR_GAME_PRICE'  => NULL,
    'ES_AR_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Australia Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Australia</strong> country
        </div>
</div>
";
$currentUrl = '/en-au/store/top-paid/games/xbox';
$country = 'EN_AU';
$databaseData = array(
    'EN_AU_GAME_PRICE'  => NULL,
    'EN_AU_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Brazil Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Brazil</strong> country
        </div>
</div>
";
$currentUrl = '/pt-br/store/top-paid/games/xbox';
$country = 'PT_BR';
$databaseData = array(
    'PT_BR_GAME_PRICE'  => NULL,
    'PT_BR_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Canada Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Canada</strong> country
        </div>
</div>
";
$currentUrl = '/en-ca/store/top-paid/games/xbox';
$country = 'EN_CA';
$databaseData = array(
    'EN_CA_GAME_PRICE'  => NULL,
    'EN_CA_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Chili Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Chili</strong> country
        </div>
</div>
";
$currentUrl = '/es-cl/store/top-paid/games/xbox';
$country = 'ES_CL';
$databaseData = array(
    'ES_CL_GAME_PRICE'  => NULL,
    'ES_CL_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Columbia Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Columbia</strong> country
        </div>
</div>
";
$currentUrl = '/es-co/store/top-paid/games/xbox';
$country = 'ES_CO';
$databaseData = array(
    'ES_CO_GAME_PRICE'  => NULL,
    'ES_CO_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Czech Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Czech</strong> country
        </div>
</div>
";
$currentUrl = '/cs-cz/store/top-paid/games/xbox';
$country = 'CS_CZ';
$databaseData = array(
    'CS_CZ_GAME_PRICE'  => NULL,
    'CS_CZ_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Dania Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Dania</strong> country
        </div>
</div>
";
$currentUrl = '/da-dk/store/top-paid/games/xbox';
$country = 'DA_DK';
$databaseData = array(
    'DA_DK_GAME_PRICE'  => NULL,
    'DA_DK_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#England Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>England</strong> country
        </div>
</div>
";
$currentUrl = '/en-gb/store/top-paid/games/xbox';
$country = 'EN_GB';
$databaseData = array(
    'EN_GB_GAME_PRICE'  => NULL,
    'EN_GB_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Evro Countries Store Parsing (Germany, Austria, Belgium, Greece, Portugal, Spain, Italy, Slovakia, France, Netherlands, Finland, Ireland)
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Evro Countries</strong> country
        </div>
</div>
";
$currentUrl = '/de-de/store/top-paid/games/xbox';
$country = 'DE_DE';
$databaseData = array(
    'DE_DE_GAME_PRICE'  => NULL,
    'DE_DE_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Hong-Kong Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Hong-Kong</strong> country
        </div>
</div>
";
$currentUrl = '/en-hk/store/top-paid/games/xbox';
$country = 'EN_HK';
$databaseData = array(
    'EN_HK_GAME_PRICE'  => NULL,
    'EN_HK_GAME_LINK'   => NULL,
    'EN_HK_DISC'        => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Hungary Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Hungary</strong> country
        </div>
</div>
";
$currentUrl = '/hu-hu/store/top-paid/games/xbox';
$country = 'HU_HU';
$databaseData = array(
    'HU_HU_GAME_PRICE'  => NULL,
    'HU_HU_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#India Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>India</strong> country
        </div>
</div>
";
$currentUrl = '/en-in/store/top-paid/games/xbox';
$country = 'EN_IN';
$databaseData = array(
    'EN_IN_GAME_PRICE'  => NULL,
    'EN_IN_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Israel Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Israel</strong> country
        </div>
</div>
";
$currentUrl = '/en-il/store/top-paid/games/xbox';
$country = 'EN_IL';
$databaseData = array(
    'EN_IL_GAME_PRICE'  => NULL,
    'EN_IL_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Japan Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Japan</strong> country
        </div>
</div>
";
$currentUrl = '/ja-jp/store/top-paid/games/xbox';
$country = 'JA_JP';
$databaseData = array(
    'JA_JP_GAME_PRICE'  => NULL,
    'JA_JP_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Mexico Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Mexico</strong> country
        </div>
</div>
";
$currentUrl = '/es-mx/store/top-paid/games/xbox';
$country = 'ES_MX';
$databaseData = array(
    'ES_MX_GAME_PRICE'  => NULL,
    'ES_MX_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#New Zealand Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>New Zealand</strong> country
        </div>
</div>
";
$currentUrl = '/en-nz/store/top-paid/games/xbox';
$country = 'EN_NZ';
$databaseData = array(
    'EN_NZ_GAME_PRICE'  => NULL,
    'EN_NZ_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Norvay Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Norvay</strong> country
        </div>
</div>
";
$currentUrl = '/nb-no/store/top-paid/games/xbox';
$country = 'NB_NO';
$databaseData = array(
    'NB_NO_GAME_PRICE'  => NULL,
    'NB_NO_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Poland Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Poland</strong> country
        </div>
</div>
";
$currentUrl = '/pl-pl/store/top-paid/games/xbox';
$country = 'PL_PL';
$databaseData = array(
    'PL_PL_GAME_PRICE'  => NULL,
    'PL_PL_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Russia Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Russia</strong> country
        </div>
</div>
";
$currentUrl = '/ru-ru/store/top-paid/games/xbox';
$country = 'RU_RU';
$databaseData = array(
    'RU_RU_GAME_PRICE'  => NULL,
    'RU_RU_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Singapore Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Singapore</strong> country
        </div>
</div>
";
$currentUrl = '/en-sg/store/top-paid/games/xbox';
$country = 'EN_SG';
$databaseData = array(
    'EN_SG_GAME_PRICE'  => NULL,
    'EN_SG_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#South Africa Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>South Africa</strong> country
        </div>
</div>
";
$currentUrl = '/en-za/store/top-paid/games/xbox';
$country = 'EN_ZA';
$databaseData = array(
    'EN_ZA_GAME_PRICE'  => NULL,
    'EN_ZA_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#South Korea Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>South Korea</strong> country
        </div>
</div>
";
$currentUrl = '/ko-kr/store/top-paid/games/xbox';
$country = 'KO_KR';
$databaseData = array(
    'KO_KR_GAME_PRICE'  => NULL,
    'KO_KR_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Switzerland Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Switzerland</strong> country
        </div>
</div>
";
$currentUrl = '/de-ch/store/top-paid/games/xbox';
$country = 'DE_CH';
$databaseData = array(
    'DE_CH_GAME_PRICE'  => NULL,
    'DE_CH_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Taiwann Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Taiwann</strong> country
        </div>
</div>
";
$currentUrl = '/zh-tw/store/top-paid/games/xbox';
$country = 'ZH_TW';
$databaseData = array(
    'ZH_TW_GAME_PRICE'  => NULL,
    'ZH_TW_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);

#Turkish Store Parsing
echo "
<div class=\"container\">
        <div class=\"alert alert-secondary\" role=\"alert\">
            Start parsing from <strong>Turkish</strong> country
        </div>
</div>
";
$currentUrl = '/tr-tr/store/top-paid/games/xbox';
$country = 'TR_TR';
$databaseData = array(
    'TR_TR_GAME_PRICE'  => NULL,
    'TR_TR_GAME_LINK'   => NULL
);
$game->setDatabaseColumn($databaseData);
$game->addRestParsingElement($db, $siteUrl, $currentUrl, $country, $getCurrency);


//Close DataBase Connection
$db->close();

$time = microtime(true) - $start;
printf('Скрипт выполнялся %.4F сек.', $time);
?>

</body>
</html>