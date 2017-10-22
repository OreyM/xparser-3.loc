<?php
require_once 'config.php';

//The country search function with the lowest price and the return of the country's identifier
function minPriceSearch($gameRow){
    $priceArray = array();
    $countryID = '';
    //Remove all games that are not in the store (they are given a price of 0.00)
    foreach ($gameRow as $key => $value) {
        if(substr($key,-5) == 'PRICE'){
            if($value == '0.00')
                continue;
            else
                //Array with actual and sifted games
                $priceArray[$key] = floatval($value);
        }
    }
    //Determining the minimum price of the game
    $val = min($priceArray);
    //Search for a country with a minimum price and determine its ID
    foreach ($priceArray as $country => $price)
    {
        if ($val == $price) {
            $countryID = substr($country,0,5);
            break;
        }
    }
    return $countryID;
}

function currentCountry($id){
    switch ($id) {
        case 'EN_US':
            $country = 'США';
            break;
        case 'EN_AU':
            $country = 'Австралия';
            break;
        case 'EN_GB':
            $country = 'Англия';
            break;
        case 'ES_AR':
            $country = 'Аргентина';
            break;
        case 'PT_BR':
            $country = 'Бразилия';
            break;
        case 'HU_HU':
            $country = 'Венгрия';
            break;
        case 'DE_DE':
            $country = 'Германия';
            break;
        case 'EN_HK':
            $country = 'Гонконг';
            break;
        case 'DA_DK':
            $country = 'Дания';
            break;
        case 'EN_IN':
            $country = 'Индия';
            break;
        case 'EN_CA':
            $country = 'Канада';
            break;
        case 'ES_CO':
            $country = 'Колумбия';
            break;
        case 'ES_MX':
            $country = 'Мексика';
            break;
        case 'EN_NZ':
            $country = 'Новая Зеландия';
            break;
        case 'NB_NO':
            $country = 'Норвегия';
            break;
        case 'AR_AE':
            $country = 'ОАЭ';
            break;
        case 'PL_PL':
            $country = 'Польша';
            break;
        case 'RU_RU':
            $country = 'Россия';
            break;
        case 'EN_SG':
            $country = 'Сингапур';
            break;
        case 'ZH_TW':
            $country = 'Тайвань';
            break;
        case 'TR_TR':
            $country = 'Турция';
            break;
        case 'CS_CZ':
            $country = 'Чехия';
            break;
        case 'ES_CL':
            $country = 'Чили';
            break;
        case 'DE_CH':
            $country = 'Швейцария';
            break;
        case 'EN_ZA':
            $country = 'ЮАР';
            break;
        case 'KO_KR':
            $country = 'Южная корея';
            break;
        case 'JA_JP':
            $country = 'Япония';
            break;
        default:
            $country = 'NA';
            break;
    }
    return $country;
}

function translitGamesTitle($str) {
    $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M', '%');
    $lat = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', 'q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m', '-procent');

    $new_str = $str;

    $new_str = str_replace("&apos;", "", $new_str);
    $new_str = str_replace(" ", "-", (preg_replace("/  +/", ' ', (preg_replace("/[^0-9a-z-_ ]/i", "", (str_replace($rus, $lat, (trim(preg_replace("/  +/", ' ', $new_str))))))))));
    $new_str= preg_replace("/--+/", '-', $new_str); // удаляем повторяющие тире

    return $new_str;
}

$tableGameDB = 'game_db';
$tableDiscount = 'discount_db';
$tableBest = 'best_db';

$bestGame = [
    'Call of Duty Infinite Warfare - Launch Edition'	=> 'btbxs3m5qqsm',
    'Call of Duty Infinite Warfare - Legacy Edition'	=> 'btdflrtvjwvp',
    'cities-skylines-xbox-one-edition'					=> 'c4gh8n6zxg5l',
    'DARK SOULS II Scholar of the First Sin'			=> 'bvbq72fdb4lk',
    'DARK SOULS III'									=> 'bw2xdrnsccpz',
    'DARK SOULS III - Deluxe Edition'					=> 'c23cwxl81h3l',
    'Dishonored 2'										=> 'bszm480tswgp',
    'DOOM'												=> 'c3qh42wrgm3r',
    'final-fantasy-xv'									=> 'c45d79qvkztp',
    'Forza Horizon 3 Standard Edition'					=> '9nblggh4x6t9',
    'Forza Motorsport 6 Standard Edition'				=> 'c291k0n6dp2g',
    'Gears of War 4'									=> 'btvffddz0tl4',
    'Halo 5 Guardians'									=> 'brrc2bp0g9p0',
    'Halo Wars 2 Standard Edition'						=> 'c42kcjclx6mx',
    'outlast-2'											=> 'bzvpnm21tcjc',
    'resident-evil-7-biohazard'							=> 'bvfdtj1xf6cs',
    'XCOM 2'											=> 'bqwgbmckrmsq',
];

###########################################
############ CONNECT TO DATABASE ##########
###########################################
$connectDatabase = DatabaseConnect::checkConnectionDatabase();
$db = $connectDatabase->connectDatabase();

//Clear table of Database
$connectDatabase->truncateTable($db, $tableGameDB);
$connectDatabase->truncateTable($db, $tableDiscount);
$connectDatabase->truncateTable($db, $tableBest);

$querySelect = $connectDatabase->selectData($db, TABLE);
$databaseRows = $querySelect->num_rows;
$counts = $querySelect->field_count;

while ($databaseRows){
    $gameRow = $querySelect->fetch_array(MYSQLI_ASSOC);
    $countryID = minPriceSearch($gameRow); //Identify the country ID with the lowest price

    $currentCountry = currentCountry($countryID); //Determine the country of the store

    $insertGameData = array(
        'GAME_ID'       => $gameRow['GAME_ID'],
        'GAME_NAME'     => $gameRow['EN_US_GAME_NAME'],
        'GAME_PRICE'    => $gameRow[$countryID.'_GAME_PRICE'],
        'GAME_LINK'     => $gameRow[$countryID.'_GAME_LINK'],
        'COUNTRY'       => $currentCountry,
        'DISCOUNT'      => $gameRow['EN_US_DISC'],
        'USA_PRICE'     => $gameRow['EN_US_GAME_PRICE'],
        'RUS_PRICE'     => $gameRow['RU_RU_GAME_PRICE'],
        'EVRO_PRICE'    => $gameRow['DE_DE_GAME_PRICE'],
        'SITE_LINK'     => translitGamesTitle($gameRow['EN_US_GAME_NAME']),
        'FREE_GAME'     =>$gameRow['FREE_GAME']
    );

    $connectDatabase->insertData($db, $tableGameDB, $insertGameData);

    if($insertGameData['DISCOUNT'] === 'A' || $insertGameData['DISCOUNT'] === 'G' || $insertGameData['DISCOUNT'] === 'P' || $insertGameData['DISCOUNT'] === 'D')
        $connectDatabase->insertData($db, $tableDiscount, $insertGameData);

    foreach ($bestGame as $key => $value){
        if($value === $gameRow['GAME_ID']){
            $connectDatabase->insertData($db, $tableBest, $insertGameData);
        }
    }

    --$databaseRows;
}

$db->close();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add data to DB</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="jumbotron" style="width: 100%; height: 100%; position: fixed; top: 0; left: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: auto; ">
            <h1 class="display-3">Games database is update!</h1>
            <p class="lead">
                <a class="btn btn-primary btn-lg center" href="../index.php" role="button">Back to menu</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
