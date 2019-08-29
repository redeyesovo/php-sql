<?php

	session_start();
	$_SESSION['name']="";
	//跳转首页
	echo "<script>alert('注销成功！');window.location.href='login.php';</script>";
