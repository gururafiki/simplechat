<?php
	require "db.php";
	if( R::count ('base',"login= ? ",array($_POST['login'])) > 0 ){
		echo (-1);
	}
	else if( R::count ('base',"mail = ?",array($_POST['mail'])) > 0 ){
		echo(-2);
	}
	else{
		$user = R::dispense('base');
		$user->login = $_POST['login'];
		$user->mail = $_POST['mail'];
		$user->password = $_POST['password'];
		$user->datebirth = $_POST['date'];
		$user->datereg = date("d.m.Y (H:i:s)", time());
		$user->ip = getenv("REMOTE_ADDR");
		$user->browserinfo = getenv("HTTP_USER_AGENT");
		$user->port = getenv("REMOTE_PORT");
		$user->typecon =  $_SERVER['HTTP_CONNECTION'];
		$user->host = gethostbyaddr(getenv("REMOTE_ADDR"));
		$user->refer = @$_SERVER['HTTP_REFERER'];
		R::store($user);
		echo ($user->id);
	}
/*	$connection = mysqli_connect('127.0.0.1', 'root', '', 'users');
	if($connection == true){	//	$result=mysqli_query($connection,"SELECT * FROM 'main'");
		$count=mysql_query($connection,"SELECT COUNT(*) FROM 'main'");
		$count_res=mysql_fetch_assoc($count);
		echo $count_res['count'];
	}
	else{
		echo("false");
	}
	mysqli_close($con);
	$login= "man";
	$password="123";
	if($login==$_POST['login'] && $password==$_POST['password']){
		//echo("true");
	}
	else{
	//	echo("false");
	}*/
?>