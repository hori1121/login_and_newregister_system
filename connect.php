<?php
try{
    $db = new PDO('mysql:dbname=like_twitter;host=127.0.0.1:3300;charset=utf8','root','');

}catch(PDOException $e){
    echo '接続に失敗しました'.$e->getMessage();
}