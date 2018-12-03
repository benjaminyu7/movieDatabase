<?php
	$genre = $_GET['genre'];
	$dbc = new PDO('mysql:host=localhost;dbname=moviedatabase', root);
	$movieInfo = $dbc->prepare("
		SELECT * FROM media m, mediaGenre mg
		WHERE m.id = mg.mediaId
		AND mg.genre = '$genre';
	");
	$movieInfo->execute();
	$movieInfo->bindColumn('name',$name);
	$movieInfo->bindColumn('releaseDate',$releaseDate);
	$movieInfo->bindColumn('duration',$duration);
	$movieInfo->bindColumn('picture',$picture);
	$movieInfo->bindColumn('rating',$rating);
	if($movieInfo->rowCount()==0) {
		echo 'No results found';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>MovieDB | Home</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/genre.css">
    </head>
    <body>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="../index.html">Home</a></li>
                    <!-- REAL SEARCH QUERIES SHOULD RESULT IN "Search by Genre: $genre" -->
                    <li class="breadcrumb-item active" aria-current="page">Search by Genre: <?php echo $genre?></li>
                </ol>
            </nav>
            <p class="h2"><?php echo $genre;?> Movies/Shows:</p>
            <div class="genre-card-list">
                <ul class="list-unstyled">

                    <!-- One result per card -->
		    <?php 
			while($movieInfo->fetch(PDO::FETCH_BOUND)) {
				echo "	    <li class='list-item'>
						    <a href='displayMovie.php?title=".urlencode($name)."' class='card-link'>
							<div class='card genre-card'>
							    <div class='card-body genre-card-body'>
								<div class='row align-items-center'>
								    <div class='col-auto'>
									<!-- show/movie picture -->
									<img class='genre-card-img' src='$picture' alt='get-out'>
								    </div>
								    <div class='col'>
									<!-- show/movie title (release year)-->
									<p class='h3'>$name <span class='text-muted h4'>(2017)</span></p>
									<ul class='list-inline text-muted'>
									    <!-- rating  -->
									    <li class='list-inline-item'>$rating</li>
									    <!-- run time -->
									    <li class='list-inline-item'>$duration</li>
									    <!-- release date -->
									    <li class='list-inline-item'>$releaseDate</li>
									</ul>
								    </div>
								</div>
							    </div>
							</div>
							</a>
						    </li>
			";
			}
			?>
		</div>
        </div>        

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
