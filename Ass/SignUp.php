<?php
if (isset($_POST['submitted']) && isset($_POST['submit'])){
	$user = $_POST['loginID'];
	$password = $_POST['loginPW'];
	$repassword = $_POST['loginPW2'];
	$db = mysqli_connect('localhost','root','');
	mysqli_query($db,'CREATE DATABASE reg');
	mysqli_select_db($db,'reg');

	if (empty($user) || empty($password) || empty($password)){
		header("Location:SignUp.php?msg=blank");
		exit;
	}
	else{
		if (strcmp($password,$repassword)){
			header("Location:SignUp.php?msg=pwError");
			exit;
		}
		else{
			$result = mysqli_query($db,'SELECT Username FROM userinfo');
			while($row = mysqli_fetch_array($result)){
				if ($user == $row['Username']){
					$valid = TRUE;
					break;
				}
				else
					$valid = FALSE;
			}
			if ($valid == TRUE){
				header("Location:SignUp.php?msg=used");
				exit;
			}
			else{
				$sql = "CREATE TABLE userinfo (
					Username VARCHAR(30) NOT NULL,
					Password VARCHAR(30) NOT NULL)";
				$sql1 = "CREATE TABLE $user (
						BookName VARCHAR(100) NOT NULL)";
				mysqli_query($db,$sql);
				mysqli_query($db,$sql1);
				$query = "INSERT INTO userinfo(Username,Password) VALUES ('$user','$password')";
				mysqli_query($db,$query);
				mysqli_close($db);
				header("Location:Login.php");
				exit;
			}
		}	
	}
}

else if (isset($_POST['submitted'])){
	header("Location:LogIn.php");
	exit;
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Sign Up</title>
<meta charset="utf-8">
<link rel="stylesheet" href="Style.css">
</head>
<body>
<div class="div1">
<h1>Library EX</h1>
<h2 style="font-size:30px;">Sign Up</h1>
</div>
<div class="div2">
	<form method="post">
	<p style="text-indent:43px;">Username &nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="loginID"></p>
	<p style="text-indent:43px;">Password &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="password" name="loginPW"></p>
	<p style="text-indent:43px;">Re-Password : <input type="password" name="loginPW2"></p>
	<?php
	if (isset($_GET['msg']) && ($_GET['msg'] == "blank"))
			echo "<span style=\"color:red;margin-left:26%;\">*Please fill up Username/Password</span>";
	if (isset($_GET['msg']) && ($_GET['msg'] == "pwError"))
			echo "<span style=\"color:red;margin-left:52%;\">*Password not match</span>";
	if (isset($_GET['msg']) && ($_GET['msg'] == "used"))
			echo "<span style=\"color:red;margin-left:61%;\">*Username used</span>";
	?>
	<p style="text-indent:55%;"><button type="submit" name="cancel">Cancel</button><span>&nbsp&nbsp</span><button type="submit" name="submit">Submit</button></p>
	<input type="hidden" name="submitted" value="true">
	</form>
</div>
<footer>
Copyright &copy; Yang 2019 All rights reserved.
</footer>
</body>
</html>