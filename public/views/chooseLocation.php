<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/min-hover.css">
    <link rel="stylesheet" type="text/css" href="public/css/mstyle.css">
    <link rel="stylesheet" type="text/css" href="public/css/mapstyle.css">

    <script src="public/js/navbar.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet'/>
    <script src="public/js/chooseLocation.js" type="module" defer></script>

    <title>Home</title>
</head>
<body>
<?php
include 'navbar.php';
echo createNavbar();
?>
<div class=map-main-content>
    <div id='map'></div>
    <div class="messages-white">
        <?php if (isset($messages)) {
            foreach ($messages as $message) {
                echo $message;
                echo '<br>';
            }
        }
        ?>
    </div>
    <form method="post">
        <input type="text" id="event-name" name="event-name" hidden = true>
        <button class="submitMarkerButton">Choose event</button>
    </form>
</div>
</body>
</html>