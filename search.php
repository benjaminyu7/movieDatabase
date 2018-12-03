<?php
	$title = htmlspecialchars($_POST['title']);
	$type = ($_POST['type']);
	/*echo $title;
	echo $type;*/
?>
<?php 
	if($type==='movieShow') { 
		header("Location: displayMovie.php?title=$title");
		exit;
	} elseif($type==='person') { 
		header("Location: displayPerson.php?title=$title");
		exit;
	} 
	elseif($type==='genre') { 
		header("Location: movieGenre.php?genre=$title");
		exit;
	}
	elseif($type==='awardShow') { 
		header("Location: awardShow.php?show=$title");
		exit;
	}
	elseif($type==='organization') { 
		header("Location: displayOrganization.php?organization=$title");
		exit;
	}
?>

