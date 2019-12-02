<?php
if (!isset($_COOKIE['login'])){
	header("Location:Login.php?msg=error");
	exit;
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Categories</title>
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
<div class="div3">
	<div class="div5">
		<a href="CategoriesDetail.php?msg=action">Action</a>
		<a href="CategoriesDetail.php?msg=adventure">Adventure</a>
		<a href="CategoriesDetail.php?msg=comedy">Comedy</a>
		<a href="CategoriesDetail.php?msg=fantasy">Fantasy</a>
		<a href="CategoriesDetail.php?msg=horror">Horror</a>
		<a href="CategoriesDetail.php?msg=mystery">Mystery</a>
		<a href="CategoriesDetail.php?msg=psychological">Psychological</a>
		<a href="CategoriesDetail.php?msg=romance">Romance</a>
		<a href="CategoriesDetail.php?msg=scifi">Sci-Fi</a>
		<a href="CategoriesDetail.php?msg=supernatural">Supernatural</a>
	</div>
</div>
<footer>
Copyright &copy; Yang 2019 All rights reserved.
</footer>
</body>
</html>