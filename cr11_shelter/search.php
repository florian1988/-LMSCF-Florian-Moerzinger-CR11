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



if(isset($_POST['query'])){
	$inpText =$_POST['query'];
	$query="SELECT name, image FROM animals WHERE name LIKE '%$inpText%'";
	$result = $conn->query($query);
	if($result->num_rows >0){
		while($row=$result->fetch_assoc()){

			echo"<div>
			<div class='card' style='width: 15rem;'>
			  <img src= ".$row['image']." class='card-img-top'>
			  <div class='card-body'>
			  <a href='#'>".$row['name']."</a>
			  </div>
			</div>
				
			</div> <a href='#'></a>";
		}
	}
	

}

?>


</body>
</html>
<?php ob_end_flush(); ?>