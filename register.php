<?php
    $link = mysqli_connect("localhost", "root", "root", "foodball");

    if (isset($_POST["submit"])){
        $err = [];

        if (!preg_match("/^[a-zA-z0-9]+$/",$_POST["login"])){
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }

        if(strlen($_POST["login"])) < 3 or strlen($_POST["login"]) > 30 {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        }

        $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
        if(mysqli_num_rows($query) > 0){
            $err[] = "Пользователь с таким логином уже существует в базе данных";
        }

        if(count($err) == 0){

            $login = $_POST['login'];

            $password = md5(md5(trim($_POST['password'])));

            mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."'");
            header("Location: login.php"); exit();
        } else {
            print "<b>При регистрации произошли следующие ошибки:</b><br>";
            foreach($err AS $error) {
            print $error."<br>";
            }
        }
    }
?>