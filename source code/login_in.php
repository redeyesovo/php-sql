<?php
include_once("inc.php");
$sql="select * FROM user where user_name='".$_POST['user_name']." 'and password='".$_POST['password']."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0){
	echo "<script>alert('用户名或者密码错误！');window.location.href='login.php';</script>";
}
else
{
	//存session
	session_start();
	$_SESSION['name']=$_POST['user_name'];
	//跳转首页
	echo "<script>alert('登陆成功！');window.location.href='index.php';</script>";
}