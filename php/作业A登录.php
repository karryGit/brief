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
$tf = false;

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $db = new DB('127.0.0.1:8080', 'root', "", 'PHP0707') or die(mysqli_error());
    $mysql = "SELECT * FROM user WHERE username ='{$username}'";
    $select = $db->selSQL($mysql);
    foreach ($select as $key => $value) {
        if ($username == $value['username']) {
            if ($password == $value['password']) {

                $tf = true;
            } else {
                echo '密码错误';
            }
        } else {
            echo '账号不存在';
        }
    }
}

