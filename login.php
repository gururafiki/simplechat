<?php
	require "db.php";
	$user= R::FindOne('base','login = ?',array($_POST['login']));
	if ($user)
	{
		if($_POST['password']==$user->password)
		{
			$_SESSION['logged_user']=$user->id;
			echo ($user->id);
		}
		else
		{
			echo ("false");
		}
	}
	else{
		echo ("false");
	}
?>