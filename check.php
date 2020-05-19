<?php
session_start();
if(!isset($_SESSION['check_name'])){
    header('Location:newregister.php');
    exit();
}
$name = $_SESSION['check_name'];
if(isset($_POST['submit'])){//登録ボタンが押されたら
    $password = $_SESSION['check_password'];
    require('connect.php');
    $regist = $db->prepare('INSERT INTO users_info(user_name,password) VALUES(?,?)');
    $regist->bindvalue(1,$name);
    $regist->bindvalue(2,$password);
    $count = $regist->execute();
    header('Location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check</title>
</head>
<body>
    
<form action="" method="post">
    <p>記載内容を確認し、間違いがなければ「登録する」をクリックしてください</p>
    
    <p>【名前】<br><?php echo htmlspecialchars($name,ENT_QUOTES)?></p>

    <p>【パスワード】<br>表示しません</p>

    <a href="newregister.php">書き直す</a>
    <input type="submit" name="submit" value="登録">
</form>
   
</body>
</html>