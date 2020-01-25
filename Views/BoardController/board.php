<!--<?php
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
        die('You are not logged in!');
    }

    if(!in_array('ROLE_USER', $_SESSION['role'])) {
        die('You do not have permission to watch this page!');
    }
?>
-->
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="Stylesheet" type="text/css" href="../Public/css/board.css" />
    <link rel="Stylesheet" href="../Public/js/app.js">
    
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <!-- <?php include(dirname(__DIR__).'/Common/head.php'); ?>-->
    <title>CRYAR</title>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="left_nav">
            <div class="menu">
                <a class="nav-link">
                    <img style="cursor: pointer;" src="../Public/img/navbar-icons/menu.svg">
                </a>
                <ul class="scroll">
                    <li>menu</li>
                    <li>map</li>
                    <li>favoriets</li>
                    <li>account</li>

                </ul>
            </div>
            <div class="map">
                <a class="nav-link">
                    <img style="cursor: pointer;" src="../Public/img/navbar-icons/map.svg">
                </a>
               
            </div>
            <div class="favourites">
                <a class="nav-link" href="?page=favourites">
                    <img style="cursor: pointer;" src="../Public/img/navbar-icons/favourites.svg" >
                </a>
            </div>
            <div class="account">
                <a class="nav-link" href="?page=account">
                    <img style="cursor: pointer;" src="../Public/img/navbar-icons/account.svg">
                </a>
            </div>
        </div>
        <div class="logo">
            <a class="navbar-brand" href="#">
                <img src="../Public/img/Group 259.svg">
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="wrapper">
                <div class="card"> 
                    <img src="../Public/img/uploads/Helcow.svg"> 
                    <h1>PARKING</h1>
                    <h>ul. Helców, 23</h>
                    <img id="sm" src="../Public/img/uploads/Group 234.svg">
                    <form class="price_button" action="?page=bookHelcow" method="POST">
                        <img src="../Public/img/uploads/Group 111.svg">
                        <button type="submit" name="helcow">CHOOSE</button>
                    </form>    
                </div>
                <div class="card"> 
                    <img src="../Public/img/uploads/Pedzichow.svg"> 
                    <h1>PARKING</h1>
                    <h>ul. Pędzichów, 23</h>
                    <img id="sm" src="../Public/img/uploads/Group 234.svg">
                    <form class="price_button" action="?page=bookPedzichow" method="POST">
                        <img src="../Public/img/uploads/Group 111.svg">
                        <button type="submit" name="pedzicow">CHOOSE</button>
                    </form>  
                </div>
                <div class="card">
                    <img src="../Public/img/uploads/Szlak.svg"> 
                    <h1>PARKING</h1>
                    <h>ul. Szlak, 65</h>
                    <img id="sm" src="../Public/img/uploads/Group 234.svg">
                    <form class="price_button" action="?page=bookSzlak" method="POST">
                        <img src="../Public/img/uploads/Group 111.svg">
                        <button type="submit" name="szlak">CHOOSE</button>
                    </form>  
                </div>
            </div>
        

    </div>

    
</div>
<script>
    $(".menu").click(function(){
        $(".scroll").toggle();
    }); 
</script>
</body>
</html>