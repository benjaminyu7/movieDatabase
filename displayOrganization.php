<?php
	$organization = $_GET['organization'];
	$dbc = new PDO('mysql:host=localhost;dbname=moviedatabase', root);
	/*get produced movies*/
	$movieInfo = $dbc->prepare("
		SELECT m.name, m.id FROM distributor d, distributes ds, media m
		WHERE d.name = '$organization'
		AND d.id = ds.distributorId
		AND m.id = ds.mediaId;
	");
	$movieInfo->execute();
	$movieInfo->bindColumn('name',$name);
	/*Get distributor location*/
	$movieInfo = $dbc->prepare("
		SELECT picture, l.* FROM location l, distributor d
		WHERE d.name = '$organization'
		AND l.id = d.location;
	");
	$movieInfo->execute();
	$movieInfo->bindColumn('picture',$organizationPicture);
	$movieInfo->bindColumn('address',$address);
	$movieInfo->bindColumn('address2',$address2);
	$movieInfo->bindColumn('city',$city);
	$movieInfo->bindColumn('state',$state);
	$movieInfo->bindColumn('country',$country);
	$movieInfo->fetch(PDO::FETCH_BOUND);

?>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MovieDB | Organization</title>
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
        <li class="breadcrumb-item active" aria-current="page">Search: <?php echo $organization; ?></li>
      </ol>
    </nav>
    <div class="card">
      <div class="card-body pt-0 pb-0">
        <div class="row">

          <div class="col-auto">
            <div class="row">
              <div class="card">
                <!-- USE PICTURE LINK FOR SRC VALUE -->
                <img class="card-img-top mb-0 img-size" src=<?php echo $organizationPicture; ?> alt=<?php echo $organization; ?> width="">
                <div class="card-footer pt-0 pb-0">
                  <!-- We're not exactly changing these so i guess just keep these static lol. -->
                  <p class="pt-0 pb-0 mb-0">Distributor | Film Studio</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <div class="row">
              <div class="col">
                <!-- Orgainzation'S NAME -->
                <p class="h3"><?php echo $organization ?></p>
                <!-- ADDRESS -->
                <ul class="list-inline">
                  <li class="list-inline-item" id="location"><?php echo $address," ", $address2," ", $city,", ", $state," ", $country; ?> </li>
                </ul>
              </div>
            </div>

            <div class="container">

              <p class="h4">Movied Produced:</p>
              <!-- MOVIE CARDS. LOOP THROUGH ALL PRODUCED/DISTRIBUTED MOVIES FOR ORGANIZATION. -->
              <div class="d-flex flex-nowrap scrolling-wrapper card-list">
                <!-- Each card in this list should be populated by the data for a single movie. -->
		<?php
			$movieInfo = $dbc->prepare("
				SELECT m.name, m.id,m.picture, m.releaseDate FROM distributor d, distribution ds, media m
				WHERE d.name = '$organization'
				AND d.id = ds.distributorId
				AND m.id = ds.mediaId;
			");
			$movieInfo->execute();
			$movieInfo->bindColumn('name',$name);
			$movieInfo->bindColumn('picture',$picture);
			$movieInfo->bindColumn('releaseDate',$releaseDate);
			while($movieInfo->fetch(PDO::FETCH_BOUND)){
				echo "
					<div class='col-auto'>
					<a href='displayMovie.php?title=".urlencode($name)."' class='card-link'>
					  <div class='card'>
					    <img src='$picture' alt='$name' class='card-img-top img-size'>
					    <div class='card-footer card-footer pt-0 pb-0'>
					      <p class='text-muted pt-0 pb-0 mb-0'>$name (".substr($releaseDate,0,4).")</p>
					    </div>
					  </div>
					</a>
					</div>
				";
			}
		?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
