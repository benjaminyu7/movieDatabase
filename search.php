<?php
	$title = htmlspecialchars($_POST['title']);
	$type = htmlspecialchars($_POST['type']);
?>
<h1><?php 
	echo $title;
	echo $type; ?></h1>

