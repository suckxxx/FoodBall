<?php
    session_start();

    if($_SESSION['userName'] == 'kvxxxAdmin') header('Location: http://127.0.0.1/openserver/phpmyadmin/index.php');

    $con = new PDO("mysql:host=localhost;dbname=foodball", "root", "root");

    $user = $_SESSION['userName'];

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
    <link rel="stylesheet" href="../../css/style.css">
    <?php echo '<title>'.$_SESSION['userName'].'</title>'?>
</head>
<body>
    <?php
        echo "<p class='user-l-name'>personal account</p>";
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
                    <?php
                        echo "<p>your name: ".$user."</p>";
                        echo "<p>your address: ".$_SESSION['address']."</p>";
                        echo "<p>your status: standart</p>";
                        echo "<p>your sale: 0%</p>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>