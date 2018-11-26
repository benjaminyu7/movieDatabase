<?php
	echo '<h1>Award Show Movies</h1>';
	$dbc = new PDO('mysql:host=localhost;dbname=moviedatabase', root);
	$movieInfo = $dbc->prepare("SELECT * FROM Movie WHERE genre = '$genre'; ");
	$movieInfo->execute();
	$movieInfo->bindColumn('name',$name);
	$movieInfo->bindColumn('genre',$genre);
	if($movieInfo->rowCount()==0) {
		echo 'No results found';
	}
	while($movieInfo->fetch(PDO::FETCH_BOUND)) {
		echo "<br>";
		echo $name;
		echo $genre;
	}
?>
?>
