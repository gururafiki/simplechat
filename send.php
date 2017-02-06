<?php
	require "db.php";
		if($_POST['msg'] != null)
		{
			$msg = R::dispense('messages');
			$msg->iduser = $_POST['id'];
			$msg->date = date("d.m.Y (H:i:s)", time());
			$msg->message = $_POST['msg'];
			R::store($msg);
			echo ("true");
		}
		else
		{
			echo ("false");
		}
?>