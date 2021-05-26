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
    <link rel="stylesheet" href="css/style.css">
    <title>FoodBall-redirect</title>
</head>
<body>
<?php
    if(isset($_POST['login'])){
        $con = new PDO("mysql:host=localhost;dbname=foodball", "root", "root");
        $query = "INSERT INTO users (login, password) VALUES (:login,:password)";
        $stmt = $con -> prepare($query);

        $stmt -> execute(array(':login'=> $_POST['login'], ':password' => md5($_POST['password'])));

        $result = $stmt->fetchAll();

        if(isset($result)) $_SESSION['userName'] = $_POST['login'];
    }

?>
</body>
</html>
