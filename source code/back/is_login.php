<?php
//判断时候登陆
session_start();
if(empty($_SESSION['name']))
	 header("location:login.php");