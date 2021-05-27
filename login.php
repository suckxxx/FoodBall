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
                        <a href="" class="logo">
                            <?php
                                if($user == 'kvxxxAdmin')
                                    echo "<img src='img/logo-admin.svg' alt='logo' id='logo'>";
                                else echo "<img src='img/logo.svg' alt='logo' id='logo'>";
                            ?>
                        </a>
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
<script src="js/loginPage.js"></script>
</body>
</html>