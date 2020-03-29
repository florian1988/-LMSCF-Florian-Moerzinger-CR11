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


if($_GET["id_animals"]){
		
			$id_animals = $_GET["id_animals"];
        
			$sql = "SELECT shelter.shelter_name, animals.id_animals, animals.image, animals.name, animals.description, animals.hobbies, animals.available, animals.status, animals.age FROM shelter inner JOIN animals on fk_shelter = id_shelter WHERE id_animals = $id_animals;";
			
			$result = mysqli_query($conn, $sql);

			$row =  $result->fetch_assoc();

		}

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
	        <a class="nav-link" href="senior.php">Senior</a>
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

<div class="container">
		<?php echo '
			<form method="post">
					  	<div class="form-group ">
						<div class="card mb-3">
					  	<img src='.$row['image'].' class="card-img-top " alt="...">
					  	<div class="card-body">
					    <h1 class="card-title">Name: <h2>'.$row['name'].'</h2></h1>
					    <hr>
					    <h1 class="card-text">Discription: <h2>'.$row['description'].'</h2></h1>
					    <hr>
					    <h1 class="card-text">Age: <h2>'.$row['age'].'</h2></h1>
					    <hr>
					    <h1 class="card-text">Available: <h2>'.$row['available'].'</h2></h1>
					    <hr>
					    <h1 class="card-text"> Hobbies: <h2>'.$row['hobbies'].'</h2></h1>
					    <hr>
					    <h1 class="card-text">Status: <h2>'.$row['status'].'</h2></h1>
					    <hr>
					    <h1 class="card-text">Shelter: <h2>'.$row['shelter_name'].'</h2></h1>
					    <a class="navbar-brand" href="user.php">Home</a>

				 		 </div>

					  		
					  </div>
					  						  
				</form>'

			?>
	</div>	

	