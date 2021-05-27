<?php
    session_start();

    $con = new PDO("mysql:host=localhost;dbname=foodball", "root", "root");

    $user = $_SESSION['userName'];

    $stmt = $con -> query('SELECT user_id,login,user_avatar,address FROM users');

    $user_avatar = $stmt -> fetchAll();

    foreach($user_avatar as $value){
        if($value['login'] == $user){ 
            $_SESSION['avatar'] = $value['user_avatar'];
            $_SESSION['address'] = $value['address'];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo-ico.svg">
    <link rel="stylesheet" href="../css/style.css">
    <?php echo "<title>AdminPanel - $user</title>";?>
</head>
<body>
    <div class="admin-header-m">
        <div class="container">
            <div class="admin-header">
                <a href="../login.php"><img src="../img/logo-admin.svg" alt="" id="logo"></a>
                <img src="../img/logout.svg" alt="" class="logout" id="logout">
            </div>
        </div>
    </div>

    <div class="admin-main">
        <div class="container">
            <div class="last-purs">
                <p class="lastP-heading" id="lastPurs">Last purchases</p>
                <div class="lastP-info" id="lastPInfo">
                    <?php
                        $allPurchases = $con -> query('SELECT * FROM cheque');
                        $purchases = $allPurchases -> fetchAll();

                        foreach($purchases as $value){
                            $id = $value['cheque_id'];
                            $cost = $value['cheque_cost'];
                            $user = $value['user_id'];
                            $food = $value['food_id'];

                            echo '<div class="ps-result">'.'<p> ID: '.$id.'</p>'.'<p> cheque cost: '.$cost.'</p>'.'<p> user: '.$user.'</p>'.'<p> food_id: '.$food.'</p>'.'</div>';
                        }
                    ?>
                </div>
            </div>
            <div class="new-rest">
                <p class="newR-heading" id="newRest">New restaurant</p>
                <form action="" class="newR-post" method="POST" id="newPost">
                    <input type="text" name="rest_name" class="newRInput" placeholder="name of restaurant">
                    <input type="text" name="rest_logo" class="newRInput" placeholder="path to the file of logo file">
                    <input type="text" name="rest_hover_logo" class="newRInput" placeholder="path to the file of hover logo file">
                    <input type="submit" value="Добавить" class="newRBtn">
                    <?php
                        $query = "INSERT INTO restaurants (rest_name, rest_logo, rest_hover_logo) VALUES (:rest_name,:rest_logo,:rest_hover_logo)";

                        $st = $con -> prepare($query);
                        
                        $st -> execute(array(':rest_name' => $_POST['rest_name'],':rest_logo' => $_POST['rest_logo'],':rest_hover_logo' => $_POST['rest_hover_logo']));

                    ?>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="../js/adminPanel.js"></script>
</html>