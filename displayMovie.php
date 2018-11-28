<?php
	$title = $_GET['title'];
	$dbc = new PDO('mysql:host=localhost;dbname=moviedatabase', root);
	/* select movie information */
	$movieInfo = $dbc->prepare("
		SELECT * FROM media m 
		WHERE m.name = '$title';
	");
	$movieInfo->execute();
	$movieInfo->bindColumn('id',$id);
	$movieInfo->bindColumn('name',$name);
	$movieInfo->bindColumn('releaseDate',$releaseDate);
	$movieInfo->bindColumn('type',$type);
	$movieInfo->bindColumn('duration',$duration);
	$movieInfo->bindColumn('boxOffice',$boxOffice);
	$movieInfo->bindColumn('rating',$rating);
	$movieInfo->bindColumn('picture',$picture);
	$movieInfo->fetch(PDO::FETCH_BOUND);
	if($movieInfo->rowCount()==0) {
		echo 'No results found';
	}
	/*
	echo $name,"<br>";
	echo $releaseDate,"<br>";
	echo $type,"<br>";
	echo $duration,"<br>";
	echo $boxOffice,"<br>";
	echo $rating,"<br>";
	echo $picture,"<br>";
	*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- search result -->
		<title>MovieDB | <?php echo $name;?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/movie.css">
        <link rel="stylesheet" href="../css/global.css">
    </head>
    <body>
        <div class="container-flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="../index.html">Home</a></li>
                    <!-- REAL SEARCH QUERIES SHOULD RESULT IN "Search: $movieName" -->
                    <li class="breadcrumb-item active" aria-current="page">Search: <?php echo $name;?></li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-auto">
                    <div class="card">
                        <img src=<?php echo "\"",$picture,"\"" ?> alt="Movie Picture" class="card-img-top movie-img ml-auto mr-auto">
                        <div class="card-footer card-footer pt-0 pb-0">
                            <!-- Movie Title -->
                            <p class="h6 text-muted text-center pt-0 pb-0 mb-0"><?php echo $name," (",substr($releaseDate, 0, 4),")";?></p>
                            <!-- Genres -->
                            <p class="text-muted text-center mb-0">
				<?php
					/* select genres of the movie */
					$movieInfo = $dbc->prepare("
						SELECT genre FROM mediaGenre
						WHERE mediaId = '$id';
					");
					$movieInfo->execute();
					$movieInfo->bindColumn('genre',$genre);
					$movieInfo->fetch(PDO::FETCH_BOUND);
					echo $genre;
					while ($movieInfo->fetch(PDO::FETCH_BOUND)) {
						echo ", ",$genre;
					}
				?>
			    </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <!-- Movie Title -->
                        <p class="h2"><?php echo $name;?></p>
                    </div>
                    <div class="row">
                        <ul class="list-inline">
                            <!-- rating, runtime, release date, box office results -->
                            <li class="list-inline-item text-muted"><strong>Rating:</strong> <?php echo $rating; ?></li>
                            <li class="list-inline-item text-muted"><strong>Runtime:</strong> <?php echo $duration; ?></li>
                            <li class="list-inline-item text-muted"><strong>Release:</strong><?php echo $releaseDate;?></li>
                            <li class="list-inline-item text-muted"><strong>Box Office:</strong><?php echo $boxOffice;?></li>
                        </ul>
                    </div>

                    <div class="row">
                        <!-- director -->
                        <div class="col-auto"><p><strong>Director:</strong> Christopher Nolan</p></div>
                        <!-- producer -->
                        <div class="col-auto"><p><strong>Producer:</strong> Christopher Nolan<p></div>
                    </div>

                    <div class="row">
                        <p class="h3">Cast:</p>
                    </div>
                    <!-- loop through all the actors -->
		    <?php 
		    	$movieInfo = $dbc->prepare("
				SELECT p.id,p.firstName,p.lastName,p.age,p.height,p.sex,p.birthdate,p.picture,l.city,l.state,l.country,c.role
				from person p, media m, casts c, location l
				WHERE m.id = '$id'
				AND m.id = c.mediaId
				AND p.id = c.personId
				and l.id = p.birthplace;
			");
			$movieInfo->execute();
			$movieInfo->bindColumn('firstName', $firstName);
			$movieInfo->bindColumn('lastName', $lastName);
			$movieInfo->bindColumn('role', $role);
			$movieInfo->bindColumn('picture', $picture);
		    ?>
                    <div class="row d-flex flex-nowrap scrolling-wrapper card-list">
                        <!-- Each card in this list should be populated by the data for a single actor. -->
			<?php
				while($movieInfo->fetch(PDO::FETCH_BOUND)){
					echo " <div class='col-auto'>
						    <div class='card'>
							<img src='$picture' alt='Inception box art' class='card-img-top actor-img mr-auto ml-auto'>
							<div class='card-footer card-footer pt-0 pb-0'>
							    <p class='text-muted pt-0 pb-0 mb-0'>$firstName $lastName</p>
							</div>
						    </div>
						</div>
					";
				}
			?>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
