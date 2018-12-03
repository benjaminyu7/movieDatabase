<?php
	$show = $_GET['show'];
	$dbc = new PDO('mysql:host=localhost;dbname=moviedatabase', root);
	$movieInfo = $dbc->prepare("
		SELECT * FROM awards a
		WHERE a.award = '$show';
	 ");
	$movieInfo->execute();
	$movieInfo->bindColumn('name',$name);
	$movieInfo->bindColumn('releaseDate',$releaseDate);
	$movieInfo->bindColumn('picture',$picture);
	if($movieInfo->rowCount()==0) {
		echo 'No results found';
	}
	while($movieInfo->fetch(PDO::FETCH_BOUND)) {
		echo "<br>";
		echo $name;
		echo $releaseDate;
		echo $picture;
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
                    <li class="breadcrumb-item active" aria-current="page">Search by Award: Oscars</li>
                </ol>
            </nav>
            <p class="h2">Oscars Winners:</p>
            <div class="genre-card-list">
                <ul class="list-unstyled">
                    <!-- Actor-based awards will have:
                            actor name
                            year of the award
                            award type
                            Movie/show title -->
                    <!-- Movie-based awards will have
                            movie name
                            year of the award
                            award type-->

                            
                    <!-- One result per card -->
                    <a href="movie.html" class="card-link">
                    <li class="list-item">
                        <div class="card genre-card">
                            <div class="card-body genre-card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- movie picture -->
                                        <img class="genre-card-img" src="../assets/testFiles/getout.jpg" alt="Leo">
                                    </div>
                                    <div class="col">
                                        <!-- Title -->
                                        <p class="h3">Get Out</p>
                                        <!-- Award type -->
                                        <p class="text-muted h6">Best Picture (2018)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="person.html" class="card-link">
                    <li class="list-item">
                        <div class="card genre-card">
                            <div class="card-body genre-card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- actor picture -->
                                        <img class="genre-card-img" src="../assets/testFiles/leo.jpg" alt="Leo">
                                    </div>
                                    <div class="col">
                                        <!-- actor -->
                                        <p class="h3">Leonardo Dicaprio</p>
                                        <ul class="list-inline text-muted">
                                            <!-- award type -->
                                            <p class="list-inline-item h6">Actor in a Leading Role (2018)</p>
                                            <!-- movie  -->
                                            <p class="list-inline-item h6">Get Out</p>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                        
                    </li>                    
                </ul>
            </div>
        </div>        

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
