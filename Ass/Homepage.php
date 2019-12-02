<?php
if (!isset($_COOKIE['login'])){
	header("Location:Login.php?msg=error");
	exit;
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Homepage</title>
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
	<div class="div4">
	<form action="BookDetail.php" method="post">
	<input type="search" name="search" style="width:395px;margin-top:1%;" placeholder="Search...Title/Author/Genre">
	<button type="submit">Search</button>
	<input type="hidden" name="searchSubmit" value="true">
	</form>
	<?php
	if (isset($_GET['msg']) && ($_GET['msg'] == "error"))
		echo "<span style=\"color:red;margin-left:62%;\">*Not Found</span>";
	?>
	</div>
	<?php
	function generateImage($file,$name,$genre){
		echo "<div class=\"div7\">";
		echo "<img src=$file alt=$name width=\"150px\" height=\"250px\" class=\"img1\">";
		echo "<a href=\"BookDetail.php?book=$name&genre=$genre&from=hp\"><span style=\"word-spacing:-1px;\">$name</span></a>";
		echo "</div>";
	}
	echo generateImage("\"Picture/ajin.JPG\"","AJIN: Demi Human","horror");
	echo generateImage("\"Picture/ar.JPG\"","Autophagy Regulation","action");
	echo generateImage("\"Picture/ginta.JPG\"","Gintama","action");
	echo generateImage("\"Picture/jojo.JPG\"","Jojo Bizarre","supernatural");
	echo generateImage("\"Picture/kuro.JPG\"","Kuroshitsuji ","action");
	echo generateImage("\"Picture/nnm.JPG\"","Nurarihyon no Mago","action");
	echo generateImage("\"Picture/o.JPG\"","Orange","romance");
	echo generateImage("\"Picture/skr.JPG\"","Sun-Ken Rock","action");
	echo generateImage("\"Picture/tlms.JPG\"","TheLegendary Moonlight Sculptor","adventure");
	echo generateImage("\"Picture/variante.JPG\"","Variante","scifi");
	echo generateImage("\"Picture/ygo.JPG\"","YuGiOh","adventure");
	?>
</div>
<footer>
Copyright &copy; Yang 2019 All rights reserved.
</footer>
</body>
</html>

