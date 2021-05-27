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
    <link rel="shortcut icon" href="img/logo-ico.svg">
    <?php echo '<title>'.$_SESSION['userName'].'</title>'?>
</head>
<body>
    <div class="user-header">
        <div class="container">
            <div class="u-head">
                <a href="login.php"><img src="img/logo.svg" alt="" id="logo"></a>
                <img src="img/logout.svg" alt="" class="logout" id="logout">
            </div>
        </div>
    </div>
    <?php
        echo "<p class='user-l-name'>$user</p>";
    ?>
    <div class="main-u">
        <div class="container">
            <div class="u-info">
                <div class="user-a">
                    <?php
                        echo "<img src='$avatar' alt=''>";
                    ?>
                </div>
                <div class="u-i">
                    <p class="u-i-heading">Your info</p>
                    <?php
                        echo "<p>your address: ".$_SESSION['address']."</p>";
                        echo "<p>your status: standart</p>";
                        echo "<p>your sale: 0%</p>";
                    ?>
                </div>
            </div>
            <div class="yLast-p">
                <p class="yLast-heading">Your purchases history</p>
                <div class="container">
                    <div class="lastU-info">
                        <?php
                            $allPurchases = $con -> query('SELECT * FROM cheque');

                            $purchases = $allPurchases -> fetchAll();

                            foreach($purchases as $value){
                                $id = $value['cheque_id'];
                                $cost = $value['cheque_cost'];
                                $user = $value['user_id'];
                                $food = $value['food_id'];
                                
                                if($user == $userId) echo '<div class="ps-result">'.'<p> ID: '.$id.'</p>'.'<p> cheque cost: '.$cost.'</p>'.'<p> user: '.$user.'</p>'.'<p> food_id: '.$food.'</p>'.'</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/user.js"></script>
</html>