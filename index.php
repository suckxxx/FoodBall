<?php
    session_start();

    if($_SESSION['userName'] != '') header('Location: login.php');

    $con = new PDO("mysql:host=localhost;dbname=foodball", "root", "root");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo-ico.svg">
    <title>FoodBall</title>
</head>
<body>

    <div id="helper"></div>

    <!-- <div class="cart-modal" id="cartModal">
        <p class="cart-heading">Cart</p>
        <div class="cart-popular">
            <p class="popular-heading">Popular</p>
            <div class="popular-food">
                <div class="food">
                    <div class="food-info">
                        <img src="img/food/burger.jpg" alt="">
                        <p>burger</p>
                        <p>cost: 300</p>
                    </div>
                    <div class="plus">
                        <p>+</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="your-cart">
            <p class="yCart-heading">Your cart</p>
        </div>
    </div> -->

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
                    <img src="img/trash.svg" alt="" class="s-cart" id="cartButton">
                    <div class="trash-count"></div>                
                </div>
            </div>
        </div>
    </div>

    <!--sign in modal-->
    <div class="modal-s" id="modal">
        <p class="login">login</p>
        <form action="pages/loginCheck.php" class="login-form" method="POST">
            <label class="login-label" for="name" id="l-log">
                <p>login</p>
            </label>
            <input type="text" name="login" placeholder="login" id="log" required>
            <label class="pass-label" for="pass" id="l-pass">
                <p>password</p>
            </label>
            <input type="password" name="pass" placeholder="password" id="pass" required>
            <input type="submit" value="sign in">
        </form>
        <p class="regtxt">
            Don't have an account? <a class="reg" id="registerButton">register now</a>
        </p>
    </div>
    <!--/sign in modal-->

    <!--reg modal-->
    <div class="modal-reg" id="modalReg">
        <p class="register">registration</p>
        <form action="pages/register.php" method="POST" class="form-reg">
            <input name="login" type="text" placeholder="your login" required>
            <input name="password" type="password" placeholder="your password" required>
            <input name="submit" type="submit" value="register">
        </form>
        <p class="logtxt">back to <a id="loginButton">login</a></p>
    </div>
    <!--/reg modal-->

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
                        <button class="s-in-btn" id="signInButton">sign in</button>
                    </div>
                </div>
            </div>
            <div class="header-b">
                <p class="main-t">Hungry? You're in the right place</p>
                <div class="input">
                    <input type="text" placeholder="enter your delivery address" class="d-a-inp">
                    <img src="img/red-arrow.svg" alt="arrow" class="r-arrow">
                </div>
                <p class="d-a-inf"><a href="" class="inf-s-in">sign in</a> for your recent addresses</p>
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
                </div>
            </div>
            <!--/fnm header-->
            <!--slider-->
            <div class="f-slider">
            <?php
                $allCategories = $con -> query('SELECT categories_name,categories_img FROM categories');

                $categories = $allCategories -> fetchAll();

                foreach($categories as $value){
                    $categoriesName = $value['categories_name'];
                    $categoriesImg = $value['categories_img'];
                    echo '<div class="slide">'."<img src='$categoriesImg' alt='categImg' class='slide-img'>".'<p class="slide-heading">'.$categoriesName.'</p>'.'</div>';
                }
            ?>
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
                <?php
                $allRest = $con -> query('SELECT rest_logo,rest_hover_logo FROM restaurants');

                $rest = $allRest -> fetchAll();

                foreach($rest as $value){
                    $restLogo = $value['rest_logo'];
                    $restHover = $value['rest_hover_logo'];
                    echo '<div class="item">'.'<div class="item-inf">'."<img src='$restLogo' alt=''>".'</div>'."<img src='$restHover' alt=''>".'</div>';
                }
                ?>
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
<script src="js/main.js"></script>
</body>
</html>