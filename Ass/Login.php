<?php
if(isset($_COOKIE["login"])){ 
	echo "OKEI";
    header("Location:Homepage.php");
	exit;
}
else{	
	if (isset($_POST['submitted']) && isset($_POST['submit'])){
		$user = $_POST['loginID'];
		$password = $_POST['loginPW'];
		$db = mysqli_connect('localhost','root','');
		mysqli_query($db,'CREATE DATABASE reg');
		mysqli_select_db($db,'reg');

		if (empty($user) || empty($password)){
			header("Location:Login.php?msg=blank");
			exit;
		}
		
		else{
			$result = mysqli_query($db,"SELECT * FROM userinfo WHERE Username='$user' and Password='$password'");
			$count = mysqli_num_rows($result);
			if ($count == 1){
				setcookie("login","true",time()+2*24*60*60);	
				setcookie("user",$_POST['loginID'],time()+2*24*60*60);
				header("Location:Homepage.php");
				exit;
			}	
			else
				header("Location:Login.php?msg=none");
				exit;
		}
	}

	else if (isset($_POST['submitted']) && isset($_POST['Sign'])){
		header("Location:SignUp.php");
		exit;
	}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<link rel="stylesheet" href="Style.css">
</head>
<body>
<div class="div1">
<h1>Library EX</h1>
<h2 style="font-size:30px;">Log In</h1>
</div>
<div class="div2">
	<form method="post">
	<p style="text-indent:43px;">Username : <input type="text" name="loginID"></p>
	<p style="text-indent:43px;">Password &nbsp: <input type="password" name="loginPW"></p>
	<?php
	if (isset($_GET['msg']) && ($_GET['msg'] == "blank"))
			echo "<span style=\"color:red;margin-left:20%;\">*Please fill up Username/Password</span>";
	if (isset($_GET['msg']) && ($_GET['msg'] == "none"))
		echo "<span style=\"color:red;margin-left:27%;\">*Incorrect Username/Password</span>";
	if (isset($_GET['msg']) && ($_GET['msg'] == "error"))
		echo "<span style=\"color:red;margin-left:60%;\">*Please log in</span>";
	?>
	<p style="text-indent:49%;"><button type="submit" name="submit">Log In</button><span>&nbsp&nbsp</span><button type="submit" name="Sign">Sign Up</button></p>
	<input type="hidden" name="submitted" value="true">
	</form>
</div>
<footer>
Copyright &copy; Yang 2019 All rights reserved.
</footer>
</body>
</html>