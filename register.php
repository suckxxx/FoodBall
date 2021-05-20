
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_POST['login'])){
        $con = new PDO("mysql:host=localhost;dbname=foodball", "root", "root");
        $query = "INSERT INTO users (login, password) VALUES (:login,:password)";
        $stmt = $con -> prepare($query);

        $stmt -> execute(array(':login'=> $_POST['login'], ':password' => $_POST['password']));

        $result = $stmt->fetchAll();

        if(isset($result)){
            echo '<p class="suc-reg">Вы успешно зарегистрированы</p>';
            echo '<a href="index.php"><button>Вернуться назад</button></a>';
        }
    }

?>

</body>
</html>
