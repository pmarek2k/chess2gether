<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/min-hover.css">
    <link rel="stylesheet" type="text/css" href="public/css/mstyle.css">
    <title>LOGIN</title>
</head>
<body>
<div class=navbar>
    <a class=hvr-underline-from-center href="home">chess2gether</a>
    <a class=hvr-underline-from-center href="login">Log in</a>
</div>
<div class=main-content>
    <div class=sign-up-form>
        Sign in
        <form action="login" method="POST">

            <input type="text" id="email" name="email" placeholder="Email" required> <br>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <div class="messages">
                <?php if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                        echo '<br>';
                    }
                }
                ?>
            </div>
            <div class=submit-arrow>
                <input class=submit type="image" src="public/img/arrow.png" class=arrow alt="Arrow">
            </div>
        </form>
        <a href=.>Forgot password?</a>
        <a href="register">Create account</a>
    </div>
</div>
</body>
</html>