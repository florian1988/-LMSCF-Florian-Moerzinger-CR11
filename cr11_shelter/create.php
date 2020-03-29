<?php
ob_start();
session_start();
require_once 'dbconn.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin' ]) ) {
 header("Location: index.php");
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
	  <a class="navbar-brand" href="admin.php">Admin</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="create.php">Create</a>
	      </li>
	      <li class="nav-item">
	      	<a  class="nav-link" href="logout.php?logout">Sign Out</a>
	        
	      </li>
	    </ul>
	  </div>
	  
	</nav>


		<div class="comtainer-fluid ">
			<div class="row">
				<div class="col-sm-2">
		
				</div>
				<div class="col-sm-8 welcome p-4">
					<form  action="create.php" method="post">
					  <div class="form-group ">
					    	<label class="text-dark" for="exampleFormControlInput1">Name</label>
						    <input class="form-control" name="name" type="text" placeholder="Name" value="">
						    <label class="text-dark" for="exampleFormControlInput1">Image</label>
						    <input class="form-control" name="image" type="text" placeholder="Image" value="">
						    <label class="text-dark" for="exampleFormControlInput1">Age</label>
						    <input class="form-control" name="age" type="int" placeholder="age" value="">
					  	
						    <label class="text-dark" for="exampleFormControlTextarea1">Description</label>
						    <textarea class="form-control" name="discription" id="exampleFormControlTextarea1" placeholder="Description" rows="3" value=""></textarea>
					  	
					    	<label class="text-dark" for="exampleFormControlInput1">Available</label>
						    <input class="form-control" name="available" type="date" placeholder="Available" value="">
					  		
					  		<label class="text-dark" for="exampleFormControlInput1">Hobbies</label>
						    <input class="form-control" name="hobbies" type="text" placeholder="Hobbies" value="">

						    <label class="text-dark" for="exampleFormControlSelect1">Status</label>
						    <select class="form-control" name="status" id="exampleFormControlSelect1" value="">
						      <option>old</option>
						      <option>large</option>
						      <option>small</option>
						    </select>

						    <label class="text-dark" for="exampleFormControlSelect1">Shelter</label>
						    <ul>
						    	<li>1: Shelter Innsburck</li>
						    	<li>2: Shelter Wien</li>
						    </ul>
						    <select class="form-control" name="fk_shelter" id="exampleFormControlSelect1" value="">
						      <option>1</option>
						      <option>2</option> 
						    </select>

							
					  	</div>
					  	<input  type="submit" class="btn btn-light btn-lg" name="submit">					  
				</form>
				</div>
				<div class="col-sm-2">
					 <?php

					if($_POST){
						$name =$_POST["name"];
						$image =$_POST["image"];
						$age =$_POST["age"];
						$discription =$_POST["discription"];
						$available =$_POST["available"];
						$hobbies =$_POST["hobbies"];
						$status =$_POST["status"];
						$fk_shelter = $_POST["fk_shelter"];

						$sql="INSERT INTO animals ( `name`, `image`, `description`, `age`, `hobbies`, `available`, `status`, `fk_shelter`) VALUES('$name', '$image', '$description', '$age', '$hobbies', '$available', '$status', '$fk_shelter')";
						
						if(mysqli_query($conn, $sql)){
							 echo '<div class="row justify-content-around">
										<div class=" col-sm-4  text-center text-dark ">
											<h1>Article is created</h1>
										</div>
									</div>';

							header("refresh:2;url=http://localhost/cr11_shelter/create.php");
						}else{
							echo "error";
						}

					}

					?> 
				</div>
				
			</div>
			
			
		</div>




</body>
</html>
<?php ob_end_flush(); ?>