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
	elseif($type==='genre') { 
		header("Location: movieGenre.php?genre=$title");
		exit;
	}
	elseif($type==='awardShow') { 
		header("Location: awardShow.php?genre=$title");
		exit;
	}
	elseif($type==='organization') { 
		header("Location: displayOrganization.php?genre=$title");
		exit;
	}
?>

