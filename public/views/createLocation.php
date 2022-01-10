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
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet'/>
    <script src="public/js/createLocation.js" type="module" defer></script>

    <title>Home</title>
</head>
<body>
<div class=navbar>
    <a class=hvr-underline-from-center href=home>chess2gether</a>
    <div class="dropdown">
        <button onClick="myFunction()" class="hvr-underline-from-center dropbtn">
            <?php
            echo $_COOKIE["user"];
            ?>
        </button>
        <div id="myDropdown" class="dropdown-content">
            <form action=home method="POST">
                <input type="submit" class="logout" value="Logout">
            </form>

        </div>
    </div>
</div>
<div class=map-main-content>
    <div id='map'></div>
    <form method="post">
        <input type="text" id="longitude" name="longitude" hidden = true>
        <input type="latitude" id="latitude" name="latitude" hidden = true>
        <input type="text" id="name" name="name" placeholder="Name" required>
        <input type="text" id="max_players" name="max_players" placeholder="Max players" required>
        <input class = "datetime" type="datetime-local" id="meeting-time"
               name="meeting-time" value="2018-06-12T19:30"
               min="2022-01-01T00:00" max="2100-01-01T00:00" required>
        <button class="submitMarkerButton">Choose location</button>
    </form>

</div>
</body>
</html>