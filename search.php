<?php
	$title = htmlspecialchars($_POST['title']);
	$type = ($_POST['type']);
?>
<?php 

	if($type==='movie') { 
		header("Location: displayMovie.php?title=$title");
		exit;
	} else { 
		$type= $type."hello";
	} 
	echo $type;
?>

