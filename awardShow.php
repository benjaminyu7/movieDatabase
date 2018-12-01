<?php
	$show = $_GET['show'];
	$dbc = new PDO('mysql:host=localhost;dbname=moviedatabase', root);
	$movieInfo = $dbc->prepare("
		SELECT a.*,p.firstName, p.lastName, p.picture,m.name,m.releaseDate,m.picture as moviePicture FROM awards a, person p, media m
		WHERE a.award = '$show'
		AND a.personId = p.id
		AND a.mediaId = m.id;
	 ");
	$movieInfo->execute();
	$movieInfo->bindColumn('firstName',$firstName);
	$movieInfo->bindColumn('lastName',$lastName);
	$movieInfo->bindColumn('name',$name);
	$movieInfo->bindColumn('releaseDate',$releaseDate);
	$movieInfo->bindColumn('picture',$picture);
	$movieInfo->bindColumn('moviePicture',$moviePicture);
	$movieInfo->bindColumn('description',$description);
	$movieInfo->bindColumn('year_awarded',$year_awarded);
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
                    <li class="breadcrumb-item active" aria-current="page">Search by Award: <?php echo $show; ?></li>
                </ol>
            </nav>
            <p class="h2"><?php echo $show?> Winners:</p>
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
		    <?php 
		    	while($movieInfo->fetch(PDO::FETCH_BOUND)) {

			echo "
			    <a href='displayPerson.php?title=".urlencode($firstName." ".$lastName)."' class='card-link'>
			    <li class='list-item'>
				<div class='card genre-card'>
				    <div class='card-body genre-card-body'>
					<div class='row align-items-center'>
					    <div class='col-auto'>
						<!-- actor picture -->
						<img class='genre-card-img' src=$picture alt='Leo'>
					    </div>
					    <div class='col'>
						<!-- actor -->
						<p class='h3'>$firstName $lastName</p>
						<ul class='list-inline text-muted'>
						    <!-- award type -->
						    <p class='list-inline-item h6'>$description ($year_awarded)</p>
						    <!-- movie  -->
						    <p class='list-inline-item h6'>$name</p>
						</ul>
					    </div>
					</div>
				    </div>
				</div>
			    </li>                    
			    </a>
			";
			}
			   ?>
                        
                </ul>
            </div>
        </div>        

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
