<?php
ob_start();
session_start();
require_once '../dbconn.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin' ]) ) {
 header("Location: ../index.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM members");

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
	  <h1 class="navbar-brand" >MyShelterAdminPage</h1>
	  <a class="navbar-brand" href="../admin.php">Admin</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="../create.php">Create</a>
	      </li>
	      <li class="nav-item">
	      	<a  class="nav-link" href="../logout.php?logout">Sign Out</a>
	        
	      </li>
	    </ul>
	  </div>
	   <form class="form-inline">
	    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	  </form>
	</nav>






<div class="comtainer-fluid ">
			
			
		<?php

			

			if($_POST){ $id_animals = $_POST['id_animals'];
						$name =$_POST["name"];
						$image =$_POST["image"];
						$age =$_POST["age"];
						$description =$_POST["description"];
						$available =$_POST["available"];
						$hobbies =$_POST["hobbies"];
						$status =$_POST["status"];
						$fk_shelter = $_POST["fk_shelter"];
	

				$sql="UPDATE animals SET `name`='$name',`image`='$image',`description`='$description',`age`='$age',`hobbies`='$hobbies',`available`='$available',`status`='$status',`fk_shelter`='$fk_shelter' WHERE id_animals = $id_animals";

	
			
			echo "<br>";

			 if(mysqli_query($conn, $sql)){
			 	echo '<div class="row">
						<div class=" col-sm-4">
							
						</div>
						<div class=" col-sm-4 welcome text-center text-dark ">
							<h1>successfully updated</h1>
							<br>
							<a class="nav-link text-dark" href="../admin.php"><h2>Link to Admin</h2></a>
						</div>
						<div class=" col-sm-4">
							
						</div>
						</div>';
			 }else{
			 	echo "error";
			 }
			}
		?>


			
</div>






</body>
</html>
<?php ob_end_flush(); ?>