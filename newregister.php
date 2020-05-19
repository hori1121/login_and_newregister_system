<?php
session_start();
require('connect.php');
if(isset($_POST['register'])){ //登録ボタンが押されたかどうか
    if($_POST['name'] !== '' && $_POST['password'] !== ''){
        $_SESSION['check_name'] = $_POST['name'];//check.phpで使うため
        $_SESSION['check_password'] = $_POST['password'];
        header('Location:check.php');
        exit();

        $regist = $db->prepare('INSERT INTO users_info(user_name,password) VALUES(?,?)');
        $regist->bindvalue(1,$_POST['name']);
        $regist->bindvalue(2,$_POST['password']);
        $count = $regist->execute();
        if($count > 0){
            echo $count.'件登録しました';
        }else{
            echo '登録に失敗しました';
        }
    }else{
     echo '';
    }
}else{
    echo '';
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>
<body>
    <a href="index.php">戻る</a>
    <h1>新規会員登録</h1>
    <form action="" method="post">
        name<input type="text" name="name"><br>
        password<input type="password" name="password"><br>
        <input type="submit" value="確認画面へ" name="register">
    </form>
</body>
</html>