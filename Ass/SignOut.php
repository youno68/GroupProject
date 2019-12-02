<?php
	setcookie("login","",time()-60);
	setcookie("user","",time()-60);
	header ("Location:Login.php");
	exit;
?>