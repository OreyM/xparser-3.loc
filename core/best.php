<?php
require_once 'config.php';

###########################################
############ CONNECT TO DATABASE ##########
###########################################
$connectDatabase = DatabaseConnect::checkConnectionDatabase();
$db = $connectDatabase->connectDatabase();
$tableGameDB = 'best_db';
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
        <?php while($databaseRows):?>
            <?php $gameRow = $querySelect->fetch_array(MYSQLI_ASSOC); ?>

            <div class="col-md-3">
                <div class="card text-center" style="margin: 20px 0;">
                    <img class="card-img-top" src="../images/game_img/<?php echo $gameRow['GAME_ID'].'.jpg'; ?>" alt="<?php echo html_entity_decode($gameRow['GAME_NAME']); ?>">
                    <div class="card-block">
                        <h4 class="card-title" style="display: block; height: 80px; font-size: 20px; margin: 8px 0;"><?php echo html_entity_decode($gameRow['GAME_NAME']); ?></h4>
                        <p class="card-text" style=" font-weight: bold; font-size: 36px;"><?php echo $gameRow['GAME_PRICE']; ?></p>
                        <p class="card-text"><td><?php echo $gameRow['COUNTRY']; ?></td></p>
                        <a href="<?php echo $gameRow['GAME_LINK']; ?>" class="btn btn-primary" style="margin: 16px 0;">MS Store</a>
                    </div>
                </div>
            </div>

            <?php --$databaseRows; ?>
        <?php endwhile;?>

    </div>
</div>

</body>
</html>

