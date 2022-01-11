<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/min-hover.css">
    <link rel="stylesheet" type="text/css" href="public/css/mstyle.css">
    <script src="public/js/navbar.js"></script>
    <title>Home</title>
</head>
<body>
<?php
include 'navbar.php';
echo createNavbar();
?>
<div class=main-content-event>
    <div class=event-box>
        Join an event
        <div class=inner-box>
            Join already existing event
        </div>
        <div class=submit-arrow>
            <a href="chooseLocation"><img src="public/img/arrow.png" class=submit alt="Arrow"></a>
        </div>
    </div>
    <div class=or>
        OR
    </div>
    <div class=event-box>
        Create an event
        <div class=inner-box>
            Start new event
        </div>
        <div class=submit-arrow>
            <a href=createLocation><img src="public/img/arrow.png" class=submit alt="Arrow"></a>
        </div>
    </div>
</div>
</body>
</html>