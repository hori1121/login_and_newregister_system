<?php
require('connect.php');
if(isset($_POST['login'])){//ログインボタンが押されたか
    if($_POST['user_name'] !== '' && $_POST['password'] !== ''){
       $check = $db->prepare('SELECT * FROM users_info WHERE user_name = ? AND password = ?');
       $check->bindvalue(1,$_POST['user_name']);
       $check->bindvalue(2,$_POST['password']);
       $check->execute();
       $count = $check->fetch();
       if($count['user_name'] !== null){
           $_SESSION['name'] = $_POST['user_name'];//main.phpで使うため
           header('Location:main.php');
           exit();
       }else{
           echo '<p style="color:red;">IDかPASSWORDが間違っています</p>';
       }
      
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ようこそ</title>
</head>
<body>
    <h1>Twitter風掲示板</h1>
    <p>ログイン</p>
    <form action="" method="post">
        NAME<input type="text" name="user_name">
        <?php
        // 未入力の場合のエラーメッセージ
        if(isset($_POST['login'])){
            if($_POST['user_name'] == ''){
                echo '<span style="color:red;">NAMEを入力してください</span>';
            }
        }
        ?>
        <br>
        PASSWORD<input type="password" name="password">
        <?php
        // 未入力の場合のエラーメッセージ
        if(isset($_POST['login'])){
            if($_POST['password'] == ''){
                echo '<span style="color:red;">PASSWORDを入力してください</span>';
            }
        }
        ?>
        <br>
        <input type="submit" value="ログイン" name="login">
    </form>
    <p><a href="newregister.php">新規登録</a></p>
</body>
</html>