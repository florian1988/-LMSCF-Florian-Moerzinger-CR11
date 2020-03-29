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
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="CSS/main.css">
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



<?php

if(isset($_POST['submit'])){
	$data = $_POST['search'];

	$sql = "SELECT * FROM animals WHERE name= '$data'";

	$result=$conn->query( $sql);

	$row= $result->fetch_assoc();	
	
}
?>

	
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
					
					    <a class="navbar-brand" href="admin.php">Home</a>

				 		 </div>

					  		
					  </div>
					  						  
				</form>'

			?>
	</div>	




</body>
</html>
<?php ob_end_flush(); ?>