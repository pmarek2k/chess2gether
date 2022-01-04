<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/min-hover.css">
    <link rel="stylesheet" type="text/css" href="public/css/mstyle.css">
    <title>SIGN UP</title>
</head>
<body>
<div class=navbar>
    <a class=hvr-underline-from-center href="home">chess2gether</a>
    <a class=hvr-underline-from-center href="login">Log in</a>
</div>
<div class=main-content>
    <div class=sign-up-form>
        Register
        <form action="register" method="POST">
            <input type="email" id="email" name="email" placeholder="E-mail" required><br>
            <input type="text" id="username" name="username" placeholder="Username" required> <br>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <div class="messages">
                <?php if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                        echo '<br>';
                    }
                }
                ?>
                <div class=submit-arrow>
                    <input class=submit type="image" src="public/img/arrow.png" alt="Arrow">
                </div>

        </form>

        <a href="login">Already have account?<br>Log in</a>
    </div>
</div>
</body>
</html>