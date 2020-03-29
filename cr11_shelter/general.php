<?php
ob_start();
session_start();
require_once 'dbconn.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
} 

 $sql = "SELECT * FROM members";
// select logged-in users details
$res=mysqli_query($conn, $sql);

$userRow=mysqli_fetch_all($res, MYSQLI_ASSOC);




?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Welcome </title>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <h1 class="navbar-brand" >MyShelterPage</h1>
	  <a class="navbar-brand" href="user.php">Home</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="senior.php">Seniors</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="general.php">General</a>
	      </li>
	      <li class="nav-item">
	      	<a  class="nav-link" href="logout.php?logout">Sign Out</a>
	        
	      </li>
	    </ul>
	  </div>
	   
	</nav>


<div class="container text-center">
		<h1>The Small and Large once</h1>
	<div class="row justify-content-around">
			<?php

	$sql = "SELECT shelter.shelter_name, animals.id_animals, animals.image, animals.name, animals.description, animals.hobbies, animals.available, animals.status, animals.age FROM shelter inner JOIN animals on fk_shelter = id_shelter WHERE animals.status = 'small' OR animals.status = 'large';";

	$result = mysqli_query($conn,$sql);		

		if ($result->num_rows == 0 ){
			echo "No result";
		}elseif($result->num_rows == 1){
			$row = $result->fetch_assoc();
			echo $row["image"]. " ". $row["name"]. " ". $row["description"]. " ". $row["age"]. "". $row["hobbies"]. "". $row["available"]. " ". $row["status"]. "".$row["shelter_name"];
		}else {
			$rows = $result->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $key => $value) {
			echo '<div class="card p-1 m-1" style="width: 20rem;">
					  <img src='. $value["image"].' class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">' .$value["name"]. '</h5>					     
					  </div>
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item"> Description: '. $value["description"].'</li>
					    <li class="list-group-item"> Age: '. $value["age"].'</li> 
					    <li class="list-group-item"> Available: '. $value["available"].'</li>
					    <li class="list-group-item"> Hobbies: '. $value["hobbies"].'</li>
					    <li class="list-group-item"> Status: '. $value["status"].'</li>
					    <li class="list-group-item"> Shelter: '.$value["shelter_name"] .'</li>
					  </ul>
					   <div class="card-body">					  	
					      <a class="card-link" href="more.php?id_animals='.$value["id_animals"].'">Read more</a><br>
					   
					     
					   </div>
				</div>';	
			}
		}
	?>
	</div>
	
</div>
</body>
</html>
<?php ob_end_flush(); ?>