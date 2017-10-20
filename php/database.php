<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 17/10/12
 * Time: 下午4:32
 */
header("content-type:text/html;charset=utf-8");

class DB
{
    private $con;
    //在构造函数里连接数据库
    //参数1:数据库地址,参数2:数据库用户名 参数3:密码, 参数4 数据库名称
    function __construct($ip = '', $dataUser = '', $dataPw = '', $dataName = '')
    {
        //根据外部传入数据连接数据库
        $this->con = mysqli_connect($ip, $dataUser, $dataPw, $dataName) or die(mysqli_error());
        //找到数据库
        mysqli_select_db($this->con,$dataName) or die(mysqli_error());
        //设置编码格式
        mysqli_query($this->con, 'set names utf8');
    }
    //查询sql语句 $sql是调用者传入进来的字符串
    function selSQL($sql)
    {
        $result = mysqli_query($this->con, $sql) or die(mysqli_error());
        $arr = [];
        //遍历提取数组
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arr, $row);
        }
        //将数组返回
        return $arr;
    }
    //增加sql语句|更改|删除
    function iduSQL($sql){
        mysqli_query($this->con,$sql)or die(mysqli_error());
        if(mysqli_affected_rows($this->con)>0){
          return true;
        }else{
            return false;
        }
    }
}






















