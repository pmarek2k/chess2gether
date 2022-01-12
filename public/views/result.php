<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/min-hover.css">
    <link rel="stylesheet" type="text/css" href="public/css/mstyle.css">

    <script src="public/js/result.js" defer></script>

    <title>Result</title>
</head>
<body>
<?php
include 'navbar.php';
echo createNavbar();
?>
<div class=main-content>
    <div class="messages-white">
        <?php if (isset($messages)) {
            foreach ($messages as $message) {
                echo $message;
                echo '<br>';
            }
        }
        ?>
</div>
</body>
</html>