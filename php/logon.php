<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 17/10/12
 * Time: 下午7:02
 */
header("content-type:text/html;charset=utf-8");
require_once 'database.php';

$username = "";
$password = "";
$phone = "";
if (isset($_POST['username']) && isset($_POST['password'])&&isset($_POST['phone'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $db = new DB('127.0.0.1:8080', 'root', "", 'PHP0707') or die(mysqli_error());
//    $mysql = "SELECT * FROM username WHERE username ='{$username}'";
//    $select = $db->selSQL($mysql);
//    foreach ($select as $key => $value) {
//        if ($username == $value['username']) {
//            echo '账号已存在';
//            return;
//        }
//    }

    $sql = "insert into username (id,username,password,phone) values(NULL ,'karry','123123','13843838438')";
//    $sql = "insert into username (id,username,password,phone) values(NULL ,'{$username}','{$password}',{$phone})";
    $insert = $db->iduSQL($sql);
    if ($insert == true) {
        echo '增加成功';
    } else {
        echo '增加失败';
    }
    //关闭数据库
    mysqli_close($db);

}


