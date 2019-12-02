<?php
if (!isset($_COOKIE['login'])){
	header("Location:Login.php?msg=error");
	exit;
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>About Us</title>
<meta charset="utf-8">
<link rel="stylesheet" href="Style.css">
</head>
<body>
<header>
<h1>Library EX</h1>
</header>
<nav>
	<a href="Homepage.php">Home</a>
	<a href="AboutUs.php"><span style="word-spacing:-1px;">About Us</span></a> 
	<a href="Categories.php">Categories</a>
	<a href="MyAccount.php"><span style="word-spacing:-1px;">My Account</span></a>
	<a href="SignOut.php"><span style="word-spacing:-1px;">Sign Out</span></a>
</nav>
<?php
	echo '<span style="margin-left:88%">'.$_COOKIE['user'].'</span>';
?>
<div class="div6">
<img src="Picture/Library.JPEG" alt="Library Pic" width="600px" height="400px" class="img">
<p class="font">The Library EX is a nonprofit organization based in the Southern Malaysia. Founded in 2019, the Library was started to promote the use of graphic novels, comics, and Japanese manga as genuine tools for improving literacy. The Library travels to conventions, book festivals, schools and other libraries to set up free reading rooms of graphic novels.
</p>
</div>
<footer>
Copyright &copy; Yang 2019 All rights reserved.
</footer>
</body>
</html>