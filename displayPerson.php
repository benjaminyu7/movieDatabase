<h1>Display Person</h1>
<?php
	$title = $_GET['title'];
	$firstName = "Robert";
	$lastName = "Downey JR";
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
	$movieInfo->bindColumn('picture',$picture);
	$movieInfo->fetch(PDO::FETCH_BOUND);
	/* Person's Info */
	echo $age, "<br>";
	echo $height, "<br>";
	echo $sex, "<br>";
	echo $birthdate, "<br>";
	echo $birthplace, "<br>";
	echo $picture, "<br>";

	/* Media person played a role in */
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
	while($movieInfo->fetch(PDO::FETCH_BOUND)){
		echo "<br>";
		echo $role, "<br>";
		echo $name, "<br>";
		echo $releaseDate, "<br>";
		echo $picture, "<br>";
	}

	/* Awards won by a person */
	$movieInfo = $dbc -> prepare("
		SELECT award,year_awarded FROM awards
		WHERE personId = '$id';
	");
	$movieInfo->execute();
	$movieInfo->bindColumn('award',$award);
	$movieInfo->bindColumn('year_awarded',$year_awarded);
	while($movieInfo->fetch(PDO::FETCH_BOUND)){
		echo "<br>";
		echo $award, "<br>";
		echo $year_awarded, "<br>";
	}

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
        <link rel="stylesheet" href="../css/person.css">
        <link rel="stylesheet" href="../css/global.css">
    </head>
    <body>
        <div class="container-flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="../index.html">Home</a></li>
                    <!-- REAL SEARCH QUERIES SHOULD RESULT IN "Search: $firstName $lastname" -->
                    <li class="breadcrumb-item active" aria-current="page">Search: Leonardo Dicaprio</li>
                </ol>
            </nav>
                <div class="card">
                    <div class="card-body pt-0 pb-0">
                        <div class="row">

                            <div class="col-auto">
                                <div class="row">
                                    <div class="card">
                                        <!-- USE PICTURE LINK FOR SRC VALUE -->
                                        <img class="card-img-top mb-0 img-size" src="../assets/testFiles/Leo.jpg" alt="Leo Pic" width="">
                                        <div class="card-footer pt-0 pb-0">
                                            <!-- CREATE LOOP IN PHP TO LIST THE PERSON'S ROLES -->
                                            <p class="pt-0 pb-0 mb-0">actor | producer | writer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <p class="h4">Awards:</p>
                                        <!-- Loop through person's awards -->
                                        <ul class="list-unstyled">
                                            <li><strong>2016:</strong> Oscar</li>
                                            <li><strong>2014:</strong> Oscar</li>
                                            <li><strong>2012:</strong> Oscar</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="row">
                                    <div class="col">
                                        <!-- PERSON'S NAME -->
                                        <p class="h3">Leonardo Dicaprio</p>
                                        <!-- OTHER PERSON DATA FIELDS HERE -->
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><STRONG>Born:</STRONG> November 11, 1974</li>
                                            <li class="list-inline-item"><strong>Sex:</strong> Male</p></li>
                                            <li class="list-inline-item"><strong>Height:</strong> 6'</p></li>
                                            <li class="list-inline-item"><strong>Age:</strong> AGE</p></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="container">

                                        <p class="h4">Acted In:</p>
                                        <!-- MOVIE CARDS. LOOP THROUGH ALL ACTED MOVIES FOR PERSON. -->
                                        <div class="d-flex flex-nowrap scrolling-wrapper card-list">
                                            <!-- Each card in this list should be populated by the data for a single movie. -->
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="h4">Produced:</p>
                                        <!-- PRODUCED MOVIE CARDS -->
                                        <div class="d-flex flex-nowrap scrolling-wrapper card-list">
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="h4">Written:</p>
                                        <!-- WRITTEN MOVIE CARDS -->
                                        <div class="d-flex flex-nowrap scrolling-wrapper card-list">
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="card">
                                                    <img src="../assets/testFiles/InceptionBox.jpg" alt="Inception box art" class="card-img-top">
                                                    <div class="card-footer card-footer pt-0 pb-0">
                                                        <p class="text-muted pt-0 pb-0 mb-0">Inception (2010)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
