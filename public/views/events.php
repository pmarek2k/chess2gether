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
    <script src="public/js/events.js" defer></script>

    <title>Events</title>
</head>
<body>
<?php
include 'navbar.php';
echo createNavbar();
?>
<div class="messages">
    <?php if (isset($messages)) {
        foreach ($messages as $message) {
            echo $message;
            echo '<br>';
        }
    }
    ?>
</div>
<div hidden id = "spinner"></div>
<div id = "event-view">
</div>
</body>
</html>