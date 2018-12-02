<?php
	$title = $_GET['title'];
	$firstName;
	$lastName;
	for($x = 0; $x < strlen($title); $x++) {
		if (substr($title, $x, 1) == " ") {
			$firstName = substr($title, 0, $x);
			$lastName = substr($title, $x+1, strlen($title) - $x);
			break;
		}
	}
	$dbc = new PDO('mysql:host=localhost;dbname=moviedatabase', root);
	$movieInfo = $dbc->prepare("
		SELECT p.* FROM person p
		WHERE p.firstName = '$firstName'
		AND p.lastName = '$lastName';
	");
	$movieInfo->execute();
	$movieInfo->bindColumn('id',$id);
	$movieInfo->bindColumn('age',$age);
	$movieInfo->bindColumn('height',$height);
	$movieInfo->bindColumn('sex',$sex);
	$movieInfo->bindColumn('birthdate',$birthdate);
	$movieInfo->bindColumn('birthplace',$birthplace);
	$movieInfo->bindColumn('picture',$personPicture);
	$movieInfo->fetch(PDO::FETCH_BOUND);

	if($movieInfo->rowCount()==0) {
		echo 'No results found';
	}
?>
<?php /* Media person played a role in, divide the movies into Actor, Director Role */
	$movieInfo = $dbc -> prepare("
		SELECT c.role, m.* FROM media m,casts c
		WHERE c.personId = '$id'
		AND m.id = c.mediaId;
	");
	$movieInfo->execute();
	$movieInfo->bindColumn('name',$name);
	$movieInfo->bindColumn('role',$role);
	$movieInfo->bindColumn('releaseDate',$releaseDate);
	$movieInfo->bindColumn('picture',$picture);
	$actors = array();
	$produced = array();
	$directed = array();
	$acted = false;
	$hasDirected = false;
	$hasProduced = false;
	while($movieInfo->fetch(PDO::FETCH_BOUND)){
		$releaseDate= "(".substr($releaseDate,0,4).")";
		$temp ="<div class='col-auto'>
				<div class='card'>
				    <img src='$picture' alt='Inception box art' class='card-img-top actor-img mr-auto ml-auto'>
				    <div class='card-footer card-footer pt-0 pb-0'>
					<p class='text-muted pt-0 pb-0 mb-0'>$name $releaseDate</p>
				    </div>
				</div>
			    </div>";
		if ($role == "Actor") {
			$actors[]= $temp;
			$acted = true;
		} elseif ($role == "Director") {
			$directed[]=$temp;
			$hasDirected = true;
		} elseif ($role == "Producer") {
			$produced[]=$temp;
			$hasProduced = true;
		}
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
        <link rel="stylesheet" href="../css/person.css">
        <link rel="stylesheet" href="../css/global.css">
    </head>
    <body>
        <div class="container-flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="../index.html">Home</a></li>
                    <!-- REAL SEARCH QUERIES SHOULD RESULT IN "Search: $firstName $lastname" -->
                    <li class="breadcrumb-item active" aria-current="page">Search: <?php echo $firstName," ",$lastName;?></li>
                </ol>
            </nav>
                <div class="card">
                    <div class="card-body pt-0 pb-0">
                        <div class="row">

                            <div class="col-auto">
                                <div class="row">
                                    <div class="card">
                                        <!-- USE PICTURE LINK FOR SRC VALUE -->
                                        <img class="card-img-top mb-0 img-size" src=<?php echo $personPicture?> alt="Leo Pic" width="">
                                        <div class="card-footer pt-0 pb-0">
                                            <!-- CREATE LOOP IN PHP TO LIST THE PERSON'S ROLES -->
					    <?php
					    	$roles = '';
						if ($acted) {
							$roles=$roles."Actor";
						}
						if ($hasDirected) {
							if ($roles != '') {
								$roles=$roles." | ";
							}
							$roles=$roles."Producer";
						}
						if($hasProduced) {
							if ($roles != '') {
								$roles=$roles." | ";
							}
							$roles=$roles."Director";
						}
					    ?>
                                            <p class="pt-0 pb-0 mb-0"><?php echo $roles?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <p class="h4">Awards:</p>
                                        <!-- Loop through person's awards -->
					<?php
						/* Awards won by a person */
						$movieInfo = $dbc -> prepare("
							SELECT award,year_awarded FROM awards
							WHERE personId = '$id';
						");
						$movieInfo->execute();
						$movieInfo->bindColumn('award',$award);
						$movieInfo->bindColumn('year_awarded',$year_awarded);
						echo '<ul class="list-unstyled">';
						while($movieInfo->fetch(PDO::FETCH_BOUND)){
							echo '<li><strong>',$year_awarded,': </strong>',$award,'</li>' ;
						}
						echo '</ul>';
					?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="row">
                                    <div class="col">
                                        <!-- PERSON'S NAME -->
                                        <p class="h3"><?php echo $firstName," ", $lastName;?></p>
                                        <!-- OTHER PERSON DATA FIELDS HERE -->
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><STRONG>Born: </STRONG><?php echo $birthdate;?></li>
                                            <li class="list-inline-item"><strong>Sex: </strong><?php echo $sex;?></p></li>
                                            <li class="list-inline-item"><strong>Height: </strong><?php echo $height, "\"";?></p></li>
                                            <li class="list-inline-item"><strong>Age: </strong><?php echo $age;?></p></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="container">

					<?php 
						if ($acted) {
							echo '<p class="h4">Acted In:</p>
								<div class="d-flex flex-nowrap scrolling-wrapper card-list">';
							foreach ($actors as $movie) {
								echo $movie;
							}
							echo '</div>';
						}
					?>

                                        <!-- PRODUCED MOVIE CARDS -->
					<?php
						if($hasProduced) {
							echo '<p class="h4">Produced:</p>
							<div class="d-flex flex-nowrap scrolling-wrapper card-list">';
						}
							foreach ($produced as $movie) {
								echo $movie;
							}
                                        		echo '</div>';
					?>

                                        <!-- WRITTEN MOVIE CARDS -->
					<?php
						if($hasDirected) {
							echo '<p class="h4">Directed:</p>
							<div class="d-flex flex-nowrap scrolling-wrapper card-list">';
									foreach ($directed as $movie) {
										echo $movie;
									}
							echo '</div>';
						}
					?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
