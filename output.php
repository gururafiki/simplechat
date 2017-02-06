<?php
	require "db.php";
	$n = R::count( 'messages' );
	$i=1;
	do
	{
		$msg = R::FindOne('messages','id = ?',array($i));
		if ($_POST['id']!=$msg->iduser)
		{
			$text="$text <div class=\"row-fluid\"><div class=\"chat\"> ";
		}
		else
		{
			$text="$text <div class=\"row-fluid\"><div class=\"mymsg\"> ";
			$id=null;
		}
		do
		{	
			$msg = R::FindOne('messages','id = ?',array($i));
			$text ="$text $msg->message </br> ";
			$i++;
			if($i!=$count)
			{
				$buf = R::FindOne('messages','id = ?',array($i));
			}
			else
			{
				break;
			}
		}
		while($msg->iduser == $buf->iduser);
		if($id!=null)
		{
			$text= "$text <div class=\"time\">$msg->date</div></div></br></div>";
		}
		else
		{
			$name=R::FindOne('base','id = ?',array($msg->iduser));
			$text= "$text <div class=\"time\">$msg->date</div><div class=\"identificator\">$name->login</div></div></br></div>";
		}
	}
	while($i<=$n);
	echo($text);

?>