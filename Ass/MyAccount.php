<?php
if (!isset($_COOKIE['login'])){
	header("Location:Login.php?msg=error");
	exit;
}

else if (isset($_POST['submitted'])){
	if (isset($_POST['Return'])){
		$return = $_POST['Return'];
		$user = $_COOKIE['user'];
		$db = mysqli_connect('localhost','root','');
		mysqli_select_db($db,'reg');
		mysqli_query($db, "UPDATE action SET Status = 'Available' WHERE BookName = '$return'");
		mysqli_query($db, "UPDATE adventure SET Status = 'Available'  WHERE BookName = '$return'");
		mysqli_query($db, "UPDATE fantasy SET Status = 'Available'  WHERE BookName = '$return'");
		mysqli_query($db, "UPDATE comedy SET Status = 'Available'  WHERE BookName = '$return'");
		mysqli_query($db, "UPDATE mystery SET Status = 'Available'  WHERE BookName = '$return'");
		mysqli_query($db, "UPDATE psychological SET Status = 'Available'  WHERE BookName = '$return'");
		mysqli_query($db, "UPDATE horror SET Status = 'Available'  WHERE BookName = '$return'");
		mysqli_query($db, "UPDATE supernatural SET Status = 'Available'  WHERE BookName = '$return'");
		mysqli_query($db, "UPDATE romance SET Status = 'Available'  WHERE BookName = '$return'");
		mysqli_query($db, "UPDATE scifi SET Status = 'Available'  WHERE BookName = '$return'");
		mysqli_query($db, "DELETE FROM $user WHERE BookName = '$return'");
		header("Location:MyAccount.php");
		exit;
	}
}	
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>My Account</title>
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
<div class="div11">
	<p class="hi">Borrowing History</p>
	<?php
	function returnBook($b){
		echo '<form method="post">';
		echo "<p style=\"text-indent:85%;\"><button type=\"submit\" name=\"Return\" value=\"$b\" class=\"button2\">Return</button></p>";
		echo '<input type="hidden" name="submitted" value="true">';
		echo "</form>";
	}
	if (isset($_GET['want'])){
		$name = $_GET['want'];
		$user = $_COOKIE['user'];
		$db = mysqli_connect('localhost','root','');
		mysqli_select_db($db,'reg');
		mysqli_query($db, "UPDATE action SET Status = 'Unavailable' WHERE BookName = '$name'");
		mysqli_query($db, "UPDATE adventure SET Status = 'Unavailable'  WHERE BookName = '$name'");
		mysqli_query($db, "UPDATE fantasy SET Status = 'Unavailable'  WHERE BookName = '$name'");
		mysqli_query($db, "UPDATE comedy SET Status = 'Unavailable'  WHERE BookName = '$name'");
		mysqli_query($db, "UPDATE mystery SET Status = 'Unavailable'  WHERE BookName = '$name'");
		mysqli_query($db, "UPDATE psychological SET Status = 'Unavailable'  WHERE BookName = '$name'");
		mysqli_query($db, "UPDATE horror SET Status = 'Unavailable'  WHERE BookName = '$name'");
		mysqli_query($db, "UPDATE supernatural SET Status = 'Unavailable'  WHERE BookName = '$name'");
		mysqli_query($db, "UPDATE romance SET Status = 'Unavailable'  WHERE BookName = '$name'");
		mysqli_query($db, "UPDATE scifi SET Status = 'Unavailable'  WHERE BookName = '$name'");
		mysqli_query($db, "INSERT INTO $user (BookName) VALUES ('$name')"); 
	}
	$user = $_COOKIE['user'];
	$db = mysqli_connect('localhost','root','');
	mysqli_select_db($db,'reg');
	$num = 0;
	$count = 0;
	$amount = mysqli_query($db,"SELECT * FROM $user");
	if ($getrow = mysqli_fetch_array($amount)){
		$num++;
		$array_amount[] = $getrow;
		while ($getrow = mysqli_fetch_array($amount)){
			$num++;
			$array_amount[] = $getrow;}
		for ($k=0;$k<$num;$k++){
			$find = $array_amount[$k]['BookName'];
			$result = mysqli_query($db,"SELECT * FROM action WHERE BookName = '$find'
								  UNION SELECT * FROM adventure WHERE BookName = '$find'
								  UNION SELECT * FROM fantasy WHERE BookName = '$find'
								  UNION SELECT * FROM comedy WHERE BookName = '$find'
								  UNION SELECT * FROM mystery WHERE BookName = '$find'
								  UNION SELECT * FROM psychological WHERE BookName = '$find'
								  UNION SELECT * FROM horror WHERE BookName = '$find'
								  UNION SELECT * FROM supernatural WHERE BookName = '$find'
								  UNION SELECT * FROM romance WHERE BookName = '$find'
								  UNION SELECT * FROM scifi WHERE BookName = '$find'");	
		
			while ($row1 = mysqli_fetch_array($result)){
				echo "<div class=\"div8\">";
				echo '<img src="data:Picture/jpg;base64,'.base64_encode($row1['BookImg'] ).'" width="250px" height="350px">';
				echo "</div>";
				echo "<div class=\"div9\">";
				echo "Book Title: ".$row1['BookName']."<br>";
				echo "Book Author: ".$row1['BookAuthor']."<br>";
				echo "Genre: ".$row1['BookGenre']."<br>";
				echo "Status: ".$row1['Completion']."<br>";
				echo "Availability: ".$row1['Status']."<br>";
				echo "Description:<br>".$row1['BookDetail']."<br>";		
				echo "</div>";
				echo returnBook($row1['BookName']);
			}
		}
	}
		
?>
</div>
<footer>
Copyright &copy; Yang 2019 All rights reserved.
</footer>
</body>
</html>