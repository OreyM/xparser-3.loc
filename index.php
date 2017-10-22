<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xbox One Parsing v.3.08</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
TEST
<div class="container">
    <div class="row">
        <div class="button-row"
             style="width: 100%; height: 100%; position: fixed; top: 0; left: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: auto; ">
            <form action="core/main.php" method="post" style="width: 20%">
                <button type="submit" class="btn btn-danger btn-lg btn-block" style="margin: 6px">Start Parsing</button>
            </form>
            <form action="core/adddb.php" method="post" style="width: 20%">
                <button type="submit" class="btn btn-warning btn-lg btn-block" style="margin: 6px">Add data to DB
                </button>
            </form>
            <form action="core/all.php" method="post" style="width: 20%">
                <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin: 6px">Get All Game Price
                </button>
            </form>
            <form action="core/best.php" method="post" style="width: 20%">
                <button type="submit" class="btn btn-success btn-lg btn-block" style="margin: 6px">Best Price</button>
            </form>
            <form action="core/instruction.html" method="post" style="width: 20%">
                <button type="submit" class="btn btn-info btn-lg btn-block" style="margin: 6px">Instruction</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
</body>
</html>