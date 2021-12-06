<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href ="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/min-hover.css">
    <link rel="stylesheet" type="text/css" href="public/css/mstyle.css">
    <title>Home</title>
</head>
<body>
<div class = navbar>
    <a class = hvr-underline-from-center href = home>chess2gether</a>
    <a class = hvr-underline-from-center href = "login">USERNAME</a>
</div>
<div class = edit-menu>
    <!-- TODO: implement edit menu -->
    <div class = user-profile>
        <div class = user-image>
            <img src="public/img/profile-pic.png">
            <form action="/action_page.php">
                <input type="file" id="myFile" name="filename">
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>