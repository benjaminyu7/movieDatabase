<?php
	$title = htmlspecialchars($_POST['title']);
	$type = ($_POST['type']);
?>
<?php 

	if($type==='movie') { 
		header("Location: displayMovie.php?title=$title");
		exit;
	} elseif($type==='person') { 
		header("Location: displayPerson.php?title=$title");
		exit;
	} 
	echo $type;
?>

