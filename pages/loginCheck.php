<?php
    session_start();
    header('Location: ../index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodBall-redirect</title>
</head>
<body>
    <?php
        $con = new PDO("mysql:host=localhost;dbname=foodball", "root", "root");

        $stmt = $con -> query('SELECT login,password FROM users');

        $users = $stmt -> fetchAll();

        foreach($users as $value){
            if($value['login'] == $_POST['login'] && $value['password'] == md5($_POST['pass'])){ 
                $_SESSION['userName'] = $_POST['login'];
            }
        }
    ?>
</body>
</html>