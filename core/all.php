<?php
require_once 'config.php';

###########################################
############ CONNECT TO DATABASE ##########
###########################################
$connectDatabase = DatabaseConnect::checkConnectionDatabase();
$db = $connectDatabase->connectDatabase();
$tableGameDB = 'game_db';
$query = "SELECT * FROM $tableGameDB ORDER BY $tableGameDB.`GAME_NAME` ASC";
$querySelect = $db->query($query);
$databaseRows = $querySelect->num_rows;
$counts = $querySelect->field_count;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All games price</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>Game Name</th>
                <th>Game ID</th>
                <th>Price</th>
                <th>Country</th>
                <th>Discount</th>
                <th>Free Game</th>
                <th>USA Price</th>
                <th>RUS Price</th>
                <th>EVRO Price</th>
            </tr>
            </thead>
            <tbody>
            <?php while($databaseRows):?>
                <?php $gameRow = $querySelect->fetch_array(MYSQLI_ASSOC); ?>
                <tr>
                    <td><a href="<?php echo $gameRow['GAME_LINK']; ?>"><?php echo html_entity_decode($gameRow['GAME_NAME']); ?></a></td>
                    <td><?php echo $gameRow['GAME_ID']; ?></td>
                    <td><?php echo $gameRow['GAME_PRICE']; ?></td>
                    <td><?php echo $gameRow['COUNTRY']; ?></td>
                    <td><?php echo $gameRow['DISCOUNT']; ?></td>
                    <td><?php echo $gameRow['FREE_GAME']; ?></td>
                    <td><?php echo $gameRow['USA_PRICE']; ?></td>
                    <td><?php echo $gameRow['RUS_PRICE']; ?></td>
                    <td><?php echo $gameRow['EVRO_PRICE']; ?></td>
                </tr>
                <?php --$databaseRows; ?>
            <?php endwhile;?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>