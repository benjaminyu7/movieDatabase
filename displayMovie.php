<h1>Movies!</h1>
<?php
	$title = $_GET['title'];
	echo $title;
	$dbc = new PDO('mysql:host=localhost;dbname=movieDatabase', root);
	$movieInfo = $dbc->prepare("Sql Statement");
	$movieInfo->execute();
	
	$movieInfo->bindColumn('title',$title);
	$movieInfo->fetch(PDO::FETCH_BOUND);
?>
