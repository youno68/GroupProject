<?php
if (!isset($_COOKIE['login'])){
	header("Location:Login.php?msg=error");
	exit;
}

else if (isset($_POST['submitted'])){
	if (isset($_POST['action'])){
	header("Location:CategoriesDetail.php?msg=action");
	exit;}
	else if (isset($_POST['adventure'])){
	header("Location:CategoriesDetail.php?msg=adventure");
	exit;}
	else if (isset($_POST['comedy'])){
	header("Location:CategoriesDetail.php?msg=comedy");
	exit;}
	else if (isset($_POST['fantasy'])){
	header("Location:CategoriesDetail.php?msg=fantasy");
	exit;}
	else if (isset($_POST['horror'])){
	header("Location:CategoriesDetail.php?msg=horror");
	exit;}
	else if (isset($_POST['mystery'])){
	header("Location:CategoriesDetail.php?msg=mystery");
	exit;}
	else if (isset($_POST['psychological'])){
	header("Location:CategoriesDetail.php?msg=psychological");
	exit;}
	else if (isset($_POST['romance'])){
	header("Location:CategoriesDetail.php?msg=romance");
	exit;}
	else if (isset($_POST['scifi'])){
	header("Location:CategoriesDetail.php?msg=scifi");
	exit;}
	else if (isset($_POST['supernatural'])){
	header("Location:CategoriesDetail.php?msg=supernatural");
	exit;}
	else if (isset($_POST['hp'])){
	header("Location:Homepage.php");
	exit;}
	else if (isset($_POST['Button'])){
		$want = $_POST['Button'];
	header("Location:MyAccount.php?want=$want");
	exit;}
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
<div class="div10">
	<?php
	function validation($a,$b){
		echo '<form method="post">';
		echo "<p style=\"text-indent:40.5%;\"><button type=\"submit\" name=$a class=\"button1\">Back</button><span>&nbsp&nbsp</span><button type=\"submit\" name=\"Button\" value=\"$b\" class=\"button1\">Borrow</button></p>";
		echo '<input type="hidden" name="submitted" value="true">';
		echo "</form>";
	}
	function validation1($a){
		echo '<form method="post">';
		echo "<p style=\"text-indent:46%;\"><button type=\"submit\" name=$a class=\"button1\">Back</button></p>";
		echo '<input type="hidden" name="submitted" value="true">';
		echo "</form>";
	}
	
	if (isset($_GET['book'])){
		$from = $_GET['from'];
		$genre = $_GET['genre'];
		$name = $_GET['book'];
		$db = mysqli_connect('localhost','root','');
		mysqli_select_db($db,'reg');
		$result = mysqli_query($db,"SELECT * FROM $genre WHERE BookName = '$name'");
		while ($row = mysqli_fetch_array($result)){
			echo "<div class=\"div8\">";
			echo '<img src="data:Picture/jpg;base64,'.base64_encode($row['BookImg'] ).'" width="250px" height="350px">';
			echo "</div>";
			echo "<div class=\"div9\">";
			echo "Book Title: ".$row['BookName']."<br>";
			echo "Book Author: ".$row['BookAuthor']."<br>";
			echo "Genre: ".$row['BookGenre']."<br>";
			echo "Status: ".$row['Completion']."<br>";
			echo "Availability: ".$row['Status']."<br>";
			echo "Description:<br>".$row['BookDetail']."<br>";
			echo "</div>";
			if ($row['Status'] == "Unavailable")
				echo validation1($from);
			else
				echo validation($from,$name);
		}
	}
	
	else if (isset($_POST['searchSubmit'])){
		$search = $_POST['search'];
		$db = mysqli_connect('localhost','root','');
		mysqli_select_db($db,'reg');
		$result = mysqli_query($db,"SELECT * FROM action WHERE BookName = '$search'
							  UNION SELECT * FROM adventure WHERE BookName = '$search'
							  UNION SELECT * FROM fantasy WHERE BookName = '$search'
							  UNION SELECT * FROM comedy WHERE BookName = '$search'
							  UNION SELECT * FROM mystery WHERE BookName = '$search'
							  UNION SELECT * FROM psychological WHERE BookName = '$search'
							  UNION SELECT * FROM horror WHERE BookName = '$search'
							  UNION SELECT * FROM supernatural WHERE BookName = '$search'
							  UNION SELECT * FROM romance WHERE BookName = '$search'
							  UNION SELECT * FROM scifi WHERE BookName = '$search'");
		if ($result){
			if ($row = mysqli_fetch_array($result)){
				echo "<div class=\"div8\">";
				echo '<img src="data:Picture/jpg;base64,'.base64_encode($row['BookImg'] ).'" width="250px" height="350px">';
				echo "</div>";
				echo "<div class=\"div9\">";
				echo "Book Title: ".$row['BookName']."<br>";
				echo "Book Author: ".$row['BookAuthor']."<br>";
				echo "Genre: ".$row['BookGenre']."<br>";
				echo "Status: ".$row['Completion']."<br>";
				echo "Availability: ".$row['Status']."<br>";
				echo "Description:<br>".$row['BookDetail']."<br>";
				echo "</div>";
				if ($row['Status'] == "Unavailable")
					echo validation1("hp");
				else
					echo validation("hp",$row['BookName']);
			}
			else
				$value = "0";
		}
		if (isset($value)){
			$result1 = mysqli_query($db,"SELECT * FROM action WHERE BookAuthor = '$search'
							  UNION SELECT * FROM adventure WHERE BookAuthor = '$search'
							  UNION SELECT * FROM fantasy WHERE BookAuthor = '$search'
							  UNION SELECT * FROM comedy WHERE BookAuthor = '$search'
							  UNION SELECT * FROM mystery WHERE BookAuthor = '$search'
							  UNION SELECT * FROM psychological WHERE BookAuthor = '$search'
							  UNION SELECT * FROM horror WHERE BookAuthor = '$search'
							  UNION SELECT * FROM supernatural WHERE BookAuthor = '$search'
							  UNION SELECT * FROM romance WHERE BookAuthor = '$search'
							  UNION SELECT * FROM scifi WHERE BookAuthor = '$search'");
			if ($result1){
				$count = 0;
				if ($row1 = mysqli_fetch_array($result1)){
					$array_result[] = $row1;
					$count++;
					while ($row1 = mysqli_fetch_array($result1)){
						$array_result[] = $row1;
						$count++;
					}
					for ($i=0;$i<$count;$i++){
						echo "<div class=\"div8\">";
						echo '<img src="data:Picture/jpg;base64,'.base64_encode($array_result[$i]['BookImg'] ).'" width="250px" height="350px">';
						echo "</div>";
						echo "<div class=\"div9\">";
						echo "Book Title: ".$array_result[$i]['BookName']."<br>";
						echo "Book Author: ".$array_result[$i]['BookAuthor']."<br>";
						echo "Genre: ".$array_result[$i]['BookGenre']."<br>";
						echo "Status: ".$array_result[$i]['Completion']."<br>";
						echo "Availability: ".$array_result[$i]['Status']."<br>";
						echo "Description:<br>".$array_result[$i]['BookDetail']."<br>";
						echo "</div>";
						if ($array_result[$i]['Status'] == "Unavailable")
							echo validation1("hp");
						else
							echo validation("hp",$array_result[$i]['BookName']);
					}
				}
				else
					$value1 = "0";
			}
		}
		if (isset($value1)){
			$search1 = strtolower($search);
			if ($search1 == "action" || $search1 == "adventure" || $search1 == "comedy" || $search1 == "fantasy" || $search1 == "mystery" || $search1 == "romance" || $search1 == "scifi" || $search1 == "supernatural" || $search1 == "psychological" || $search1 == "horror"){
				header("Location:CategoriesDetail.php?msg=$search1");
				exit;}
				
			else{
				header("Location:Homepage.php?msg=error");
				exit;}
		}
	}
	?>
</div>
<footer>
Copyright &copy; Yang 2019 All rights reserved.
</footer>
</body>
</html>

