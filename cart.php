<?php
    session_start();

    if($_SESSION['userName'] == 'kvxxxAdmin') header('Location: protect/admin.php');

    $con = new PDO("mysql:host=localhost;dbname=foodball", "root", "root");

    if($_SESSION['userName'] == '') header('Location: index.php');

    $user = $_SESSION['userName'];

    $stmt = $con -> query('SELECT user_id,login,user_avatar,address FROM users');

    $user_avatar = $stmt -> fetchAll();

    foreach($user_avatar as $value){
        if($value['login'] == $user){ 
            $_SESSION['id'] = $value['user_id'];
            $_SESSION['avatar'] = $value['user_avatar'];
            $_SESSION['address'] = $value['address'];
        }
    }

    $avatar = $_SESSION['avatar'];

    $userId = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <?php echo '<title>'.$user.' - Cart</title>'?>
</head>
<body>
    <div class="cart-header">
        <div class="container">
            <div class="ch-main">
                <a href="login.php" class="logo"><img src='img/cart-logo.svg' alt='logo' id='logo'></a>
                <div class="cartH-2">
                    <div class="user-photo" id="userPhoto">
                        <?php
                            echo "<img src='$avatar' alt='user' id='user'>";
                        ?>
                    </div>
                    <img src="img/logout.svg" alt="" class="logout" id="logout">
                </div>
            </div>
        </div>
    </div>
    <div class="cart-popular">
        <div class="container">
            <div class="popular-food">
                <p class="pf-heading">Popular food</p>
                <div class="pfood">
                    <div class="food">
                        <img src="img/food/burger.jpg" alt="">
                        <div>
                            <p>Burger</p>
                            <p>cost: 300</p>
                        </div>
                    </div>
                    <div class="food">
                        <img src="img/food/salad.jpg" alt="">
                        <div>
                            <p>Salad</p>
                            <p>cost: 300</p>
                        </div>
                    </div>
                    <div class="food">
                        <img src="img/food/cola.jpg" alt="">
                        <div>
                            <p>cola</p>
                            <p>cost: 300</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/cart.js"></script>
</html>