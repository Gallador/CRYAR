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
    
    <link rel="Stylesheet" type="text/css" href="../Public/css/booking.css" />
    
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
                <a class="nav-link" href="?page=board">
                    <img style="cursor: pointer;" src="../Public/img/navbar-icons/map.svg">
                </a>
               
            </div>
            <div class="favourites">
                <a class="nav-link" href="?page=favourites">
                    <img style="cursor: pointer;" src="../Public/img/navbar-icons/favourites.svg">
                </a>
            </div>
            <div class="account">
                <a class="nav-link" href="?page=account">
                    <img style="cursor: pointer;" src="../Public/img/navbar-icons/account.svg">
                </a>
            </div>
        </div>
        <div class="logo">
            <a class="navbar-brand" href="?page=board">
                <img src="../Public/img/Group 259.svg">
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="wrapper">
                <div class="card"> 
                    <img src="../Public/img/uploads/Szlak.svg"> 
                    <h1>PARKING</h1>
                    <h>ul. Szlak, 65</h>
                    <img id="sm" src="../Public/img/uploads/Group 234.svg">
                    <div class="price_button">
                        <img src="../Public/img/uploads/Group 111.svg">
                        <form method="POST"><button name="book_szlak">BUY FOR 1 HOUR</button></form>
                    </div>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Success!</strong> Thank you for booking.
                    </div>
                    <div  class="Map">
                        <div id="map"></div>
                    </div>
                    <a href="?page=board">GO BACK</a>
                </div>
                
    </div>
    
    
</div>
<script>
function initMap() {
    var szlak = { lat: 50.071157, lng: 19.940466};
    var opt = {
        center: { lat: 50.071157, lng: 19.940466},
                zoom: 17,
    };
    var map = new google.maps.Map(document.getElementById("map"), opt);
    var marker = new google.maps.Marker({
        position: szlak,
        map: map,
        icon: {
            url: '../Public/img/placeholder.svg',
            scaledSize: new google.maps.Size(70,70),
        }
    });

}
</script>
<script>
    $(".menu").click(function(){
        $(".scroll").toggle();
    }); 
    $(".price_button").click(function(){
        $(".alert").toggle();
    }); 
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx2nBzqhgQdsrnZFXAipPR_CH9BU3Ibw4&callback=initMap" async defer>
</script>
</body>
</html>