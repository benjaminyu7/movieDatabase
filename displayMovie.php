<h1>Movies!</h1>
<?php
	$title = $_GET['title'];
	$dbc = new PDO('mysql:host=localhost;dbname=movieDatabase', root);
	$movieInfo = $dbc->prepare("SELECT * FROM Movie WHERE name = '$title' ");
	$movieInfo->execute();
	$movieInfo->bindColumn('name',$name);
	$movieInfo->bindColumn('genre',$genre);
	$movieInfo->fetch(PDO::FETCH_BOUND);
	if($movieInfo->rowCount()==0) {
		echo 'No results found';
	}
	echo $name,"<br>";
	echo $genre;
?>
