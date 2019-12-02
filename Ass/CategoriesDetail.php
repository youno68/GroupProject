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
	<?php
	function generateImage($file,$name,$genre){
		echo "<div class=\"div7\">";
		echo "<img src=$file alt=$name width=\"150px\" height=\"250px\" class=\"img1\">";
		echo "<a href=\"BookDetail.php?book=$name&genre=$genre&from=$genre\"><span style=\"word-spacing:-1px;\">$name</span></a>";
		echo "</div>";
	}
	if (isset($_GET['msg']) && ($_GET['msg'] == "action")){
	echo generateImage("\"Picture/ag.JPG\"","AirGear","action");
	echo generateImage("\"Picture/agk.JPG\"","Akame ga Kiru!","action");
	echo generateImage("\"Picture/aot.JPG\"","Attack of Titan","action");
	echo generateImage("\"Picture/ar.JPG\"","Autophagy Regulation","action");
	echo generateImage("\"Picture/ginta.JPG\"","Gintama","action");
	echo generateImage("\"Picture/hxh.JPG\"","Hunter X Hunter","action");
	echo generateImage("\"Picture/kuro.JPG\"","Kuroshitsuji ","action");
	echo generateImage("\"Picture/nnm.JPG\"","Nurarihyon no Mago","action");
	echo generateImage("\"Picture/rnk.JPG\"","Reincarnation no Kaben","action");
	echo generateImage("\"Picture/snp.JPG\"","Saihate no Paladin","action");
	echo generateImage("\"Picture/se.JPG\"","Soul Eater","action");
	echo generateImage("\"Picture/skr.JPG\"","Sun-Ken Rock","action");
	}
	
	else if (isset($_GET['msg']) && ($_GET['msg'] == "adventure")){
	echo generateImage("\"Picture/1001.JPG\"","1001 Knights","adventure");
	echo generateImage("\"Picture/bc.JPG\"","Black Clover","adventure");
	echo generateImage("\"Picture/ft.JPG\"","Fairy Tail","adventure");
	echo generateImage("\"Picture/fnls.JPG\"","Final Fantasy Lost Stranger","adventure");
	echo generateImage("\"Picture/lb.JPG\"","Letter Bee","adventure");
	echo generateImage("\"Picture/lh.JPG\"","LogHorizon","adventure");
	echo generateImage("\"Picture/magi.JPG\"","Magi ","adventure");
	echo generateImage("\"Picture/nora.JPG\"","Noragami","adventure");
	echo generateImage("\"Picture/ps.JPG\"","Pumpkin Scissors","adventure");
	echo generateImage("\"Picture/tdg.JPG\"","Tales of Demons and Gods","adventure");
	echo generateImage("\"Picture/tlms.JPG\"","TheLegendary Moonlight Sculptor","adventure");
	echo generateImage("\"Picture/ygo.JPG\"","YuGiOh","adventure");
	}
	
	else if (isset($_GET['msg']) && ($_GET['msg'] == "comedy")){
	echo generateImage("\"Picture/half.JPG\"","1/2Prince","comedy");
	echo generateImage("\"Picture/bkm.JPG\"","Bakuman","comedy");
	echo generateImage("\"Picture/ca.JPG\"","Cross account","comedy");
	echo generateImage("\"Picture/def.JPG\"","Defense Devil","comedy");
	echo generateImage("\"Picture/fas.JPG\"","Father and Son","comedy");
	echo generateImage("\"Picture/hxk.JPG\"","Haru x Kiyo","comedy");
	echo generateImage("\"Picture/nxbmw.JPG\"","NiXi Ba Mo Wang!","comedy");
	echo generateImage("\"Picture/rm.JPG\"","Rave Master","comedy");
	echo generateImage("\"Picture/tnsk.JPG\"","Tonari no Seki-kun ","comedy");
	echo generateImage("\"Picture/xxx.JPG\"","xxxHOLiC ","comedy");
	echo generateImage("\"Picture/ykk.JPG\"","Yankee-kun to Megane-chan","comedy");
	}
	
	else if (isset($_GET['msg']) && ($_GET['msg'] == "fantasy")){
	echo generateImage("\"Picture/dl.JPG\"","Devils Line","fantasy");
	echo generateImage("\"Picture/dd.JPG\"","Drifting Dragons","fantasy");
	echo generateImage("\"Picture/k&m.JPG\"","Knights and Magic","fantasy");
	echo generateImage("\"Picture/rta.JPG\"","Restaurant to Another World","fantasy");
	}
	
	else if (isset($_GET['msg']) && ($_GET['msg'] == "horror")){
	echo generateImage("\"Picture/ajin.JPG\"","AJIN: Demi Human","horror");
	echo generateImage("\"Picture/another.JPG\"","Another","horror");
	echo generateImage("\"Picture/gantz.JPG\"","Gantz","horror");
	echo generateImage("\"Picture/kg.JPG\"","Kings Game","horror");
	echo generateImage("\"Picture/parasyte.JPG\"","Parasyte","horror");
	echo generateImage("\"Picture/uzumaki.JPG\"","Uzumaki","horror");
	
	}
	
	else if (isset($_GET['msg']) && ($_GET['msg'] == "mystery")){
	echo generateImage("\"Picture/bloody.JPG\"","Bloody Monday","mystery");
	echo generateImage("\"Picture/bungo.JPG\"","Bungo Stray Dogs","mystery");
	echo generateImage("\"Picture/doubt.JPG\"","Doubt","mystery");
	echo generateImage("\"Picture/mpd.JPG\"","MPD Psycho","mystery");
	}
	
	else if (isset($_GET['msg']) && ($_GET['msg'] == "psychological")){
	echo generateImage("\"Picture/royale.JPG\"","Battle Royale","psychological");
	echo generateImage("\"Picture/diary.JPG\"","Future Diary","psychological");
	echo generateImage("\"Picture/homo.JPG\"","Homunculus","psychological");
	echo generateImage("\"Picture/psyren.JPG\"","Psyren","psychological");
	echo generateImage("\"Picture/tn.JPG\"","Talentless Nana","psychological");
	}
	
	else if (isset($_GET['msg']) && ($_GET['msg'] == "romance")){
	echo generateImage("\"Picture/bmk.JPG\"","Bokura wa Minna Kawaisou","romance");
	echo generateImage("\"Picture/o.JPG\"","Orange","romance");
	echo generateImage("\"Picture/ss.JPG\"","Spirit	 Circle","romance");
	}
	
	else if (isset($_GET['msg']) && ($_GET['msg'] == "scifi")){
	echo generateImage("\"Picture/pass.JPG\"","Psycho Pass","scifi");
	echo generateImage("\"Picture/variante.JPG\"","Variante","scifi");
	echo generateImage("\"Picture/world.JPG\"","World Customize Creator","scifi");
	}
	
	else if (isset($_GET['msg']) && ($_GET['msg'] == "supernatural")){
	echo generateImage("\"Picture/jojo.JPG\"","Jojo Bizarre","supernatural");
	echo generateImage("\"Picture/owari.JPG\"","Owari no Seraph: Kyuuketsuki Mikaela no Monogatari","supernatural");
	echo generateImage("\"Picture/school.JPG\"","TheIrregular at Magic High School SS","supernatural");
	}
	?>
</div>
<footer>
Copyright &copy; Yang 2019 All rights reserved.
</footer>
</body>
</html>