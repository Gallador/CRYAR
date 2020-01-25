<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/register.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <?php include(dirname(__DIR__).'/Common/head.php'); ?>
    <title>REGISTER</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="../Public/img/cryar.jpg">
        <h>REGISTER</h>
    </div>
    <form action="?page=registerAcception" method="POST">
        <input name="Name" type="text" placeholder="Name">
        <input name="Surname" type="text" placeholder="Surname">
        <input name="Email" type="text" placeholder="email@email.com">
        <input name="Password" type="password" placeholder="password">
        <button type="submit" name="aaa">REGISTER ME</button>
    </form>
    </div>
</div>
</body>
</html>