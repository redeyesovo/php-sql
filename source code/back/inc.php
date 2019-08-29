<?php
//数据库链接程序
header("Content-Type: text/html; charset=UTF-8");
$host="localhost";
$user="root";
$pwd="";
$conn=mysqli_connect($host,$user,$pwd);
if(!$conn)
	die("数据库连接失败！");
mysqli_select_db($conn,'qmy');

//判断时候登陆