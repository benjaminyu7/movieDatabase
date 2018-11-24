<h1>Display Person</h1>
<?php
	$title = $_GET['title'];
	$dbc = new PDO('mysql:host=localhost;dbname=movieDatabase', root);
	$movieInfo = $dbc->prepare("SELECT * FROM Person WHERE name = '$title' ");
	$movieInfo->execute();
	$movieInfo->bindColumn('name',$name);
	$movieInfo->fetch(PDO::FETCH_BOUND);
	if($movieInfo->rowCount()==0) {
		echo 'No results found';
	}
	echo $name,"\n";
?>
