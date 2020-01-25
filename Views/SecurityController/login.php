<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <?php include(dirname(__DIR__).'/Common/head.php'); ?>
    <title>CRYAR</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="../Public/img/cryar.jpg">
        <img src="../Public/img/u_user.png">
    </div>
    <form action="?page=login" method="POST">
        <div class="messages">
            <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
        </div>
        <input name="email" type="text" placeholder="email@email.com">
        <input name="password" type="password" placeholder="password">
        <button type="submit">SIGN IN</button>
    </form>
    <form action="?page=register" method="POST">
        <div class="register">
            <button type="submit" name="regitration">REGISTER</button>
        </div>
    </form>
</div>
</body>
</html>