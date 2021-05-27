<?php
    session_start();

    $con = new PDO("mysql:host=localhost;dbname=foodball", "root", "root");

    $user = $_SESSION['userName'];

    if($_SESSION['userName'] == '') header('Location: index.php');

    $stmt = $con -> query('SELECT login,user_avatar,address FROM users');

    $user_avatar = $stmt -> fetchAll();

    foreach($user_avatar as $value){
        if($value['login'] == $user){ 
            $_SESSION['avatar'] = $value['user_avatar'];
            $_SESSION['address'] = $value['address'];
        }
    }

    $avatar = $_SESSION['avatar'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo-ico.svg">
    <?php echo '<title>'.$_SESSION['userName'].'</title>'?>
</head>
<body>
    <div id="helper"></div>

    <div class="burger-modal" id="burgerModal">
        <div class="container">
            <div class="burger-nav">
                <img src="img/cross.svg" alt="cross" class="burger-cross" id="burgerLeave">
                <div class="nav">
                    <a href="#fnm">Food near me</a>
                    <a href="#or">Other restaurants</a>
                    <a href="#bad">Become a delivery</a>
                    <a href="#htp">Help the project</a>
                </div>
                <div class="cart">
                    <img src="img/trash.svg" alt="" class="s-cart">
                    <div class="trash-count"></div>
                </div>
            </div>
        </div>
    </div>

    <!--header-->
    <div class="header">
        <div class="container">
            <div class="header-t" id="headerTop">
                <div class="h-t-1">
                    <div class="burger" id="burger">
                        <div class="trash-count" id="trash"></div>
                    </div>
                    <div class="logo-c">
                        <a href="" class="logo"><img src="img/logo.svg" alt="logo" id="logo"></a>
                    </div>
                </div>
                <div class="h-t-2">
                    <div class="s-in-c">
                        <div class="user-photo" id="userPhoto">
                            <?php
                                echo "<img src='$avatar' alt='user' id='user'>";
                            ?>
                        </div>
                        <img src="img/logout.svg" alt="" class="logout" id="logout">
                    </div>
                </div>
            </div>
            <div class="header-b">
                <p class="main-t">Hungry? You're in the right place</p>
                <?php
                    if($_SESSION['address'] == ''){
                        echo '<div class="input"><input type="text" placeholder="enter your delivery address" class="d-a-inp"><img src="img/red-arrow.svg" alt="arrow" class="r-arrow"></div><p class="d-a-inf"><a href="" class="inf-s-in">sign in</a> for your recent addresses</p>';
                    }
                    else{
                        echo '<p class="user-address">'.$_SESSION['address'].'</p>';
                    };
                ?>
            </div>
        </div>
    </div>
    <!--/header-->

    <!--food near me-->
    <div class="fnm">
        <div class="container">
            <!--fnm header-->
            <div class="fnm-header">
                <div class="heading">
                    <a name="fnm">Food near me</a>
                </div>
                <div class="slider-arrow">
                    <a href="#" class="v-all">view all</a>
                    <a href="#" class="a-left">
                        <img src="img/arrow-l.svg" alt="arrow">
                    </a>
                    <a href="#" class="a-right">
                        <img src="img/arrow-r.svg" alt="arrow">
                    </a>
                </div>
            </div>
            <!--/fnm header-->
            <!--slider-->
            <div class="f-slider">
                <div class="slide">
                    <img src="img/s-food-fastfood.jpg" alt="" class="slide-img">
                    <p class="slide-heading">fast food</p>
                </div>
                <div class="slide">
                    <img src="img/s-food-breakfast.jpg" alt="" class="slide-img">
                    <p class="slide-heading">breakfast</p>
                </div>
                <div class="slide">
                    <img src="img/s-food-american.jpg" alt="" class="slide-img">
                    <p class="slide-heading">american</p>
                </div>
                <div class="slide">
                    <img src="img/s-food-mexican.jpg" alt="" class="slide-img">
                    <p class="slide-heading">mexican</p>
                </div>
                <div class="slide">
                    <img src="img/s-food-chinese.jpg" alt="" class="slide-img">
                    <p class="slide-heading">chinese</p>
                </div>
                <div class="slide">
                    <img src="img/s-food-meat.jpg" alt="" class="slide-img">
                    <p class="slide-heading">meat</p>
                </div>
                <div class="slide">
                    <img src="img/s-food-fish.jpg" alt="" class="slide-img">
                    <p class="slide-heading">fish</p>
                </div>
                <div class="slide">
                    <img src="img/s-food-vegetables.jpg" alt="" class="slide-img">
                    <p class="slide-heading">vegetables</p>
                </div>
            </div>
            <!--/slider-->
        </div>
    </div>
    <!--/food near me-->

    <!--other restaurants-->
    <div class="otr">
        <div class="container">
            <div class="otr-heading">
                <div class="heading">
                    <a name="or">Other restaurants</a>
                </div>
                <div class="view-all">
                    <a href="" class="v-all">view all</a>
                </div>
            </div>
            <div class="otr-items">
                <div class="item">
                    <div class="item-inf">
                        <img src="img/mc_donalds.png" alt="">
                    </div>
                    <img src="img/rest1.jpg" alt="">
                </div>
                <div class="item">
                    <div class="item-inf">
                        <img src="img/papajohns.svg" alt="">
                    </div>
                    <img src="img/rest2.jpg" alt="">
                </div>
                <div class="item">
                    <div class="item-inf">
                        <img src="img/burger_king.png" alt="">
                    </div>
                    <img src="img/rest3.jpeg" alt="">
                </div>
                <div class="item">
                    <div class="item-inf">
                        <img src="img/vkuss.png" alt="">
                    </div>
                    <img src="img/rest4.jpg" alt="">
                </div>
                <div class="item">
                    <div class="item-inf">
                        <img src="img/starbucks-logo.png" alt="">
                    </div>
                    <img src="img/rest5.jpg" alt="">
                </div>
                <div class="item">
                    <div class="item-inf">
                        <img src="img/dixi.svg" alt="">
                    </div>
                    <img src="img/rest6.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!--/other restaurants-->

    <!--become a delivery-->
    <div class="bad">
        <div class="container">
            <div class="heading">
                <a name="bad">Become a delivery</a>
            </div>
            <div class="delivery">
                <div>
                    <img src="img/delivery.svg" alt="" class="blur-delivery">
                    <img src="img/delivery.svg" alt="">
                    <div class="delivery-text">  
                        <p>Age 18 years</p>
                        <p>The right to drive a car or motorcycle</p>
                        <p>Willingness to work 8 hours a day</p>
                        <p>Punctuality</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/become a delivery-->

    <!--help the project-->
    <div class="htp">
        <div class="container">
            <div class="heading">
                <a name="htp">Help the project</p>
            </div>
            <div class="project">
                <div>
                    <img src="img/donate.png" alt="donate" class="blur-donate">
                    <img src="img/donate.png" alt="donate" class="donate">
                    <p>- scan me</p>
                </div>
            </div>
        </div>
    </div>
    <!--/help the project-->

    <!--footer-->
    <div class="footer">
    </div>
    <!--/footer-->
<script src="js/loginPage.js"></script>
</body>
</html>