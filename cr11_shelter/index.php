<?php
ob_start();
session_start();
require_once 'dbconn.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: user.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $pass = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT * FROM members WHERE email='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 
  if( $count == 1 && $row['pass' ]==$pass ) {
    if($row["status"] == 'admin'){
      $_SESSION['admin'] = $row['id_members'];
      header( "Location: admin.php");
    }else{
      $_SESSION['user'] = $row['id_members'];
      header( "Location: user.php");
    }
  } else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
 
 }

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>

<link rel="stylesheet" href ="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"  crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="CSS/main.css">
</head>
<body class="index_b">
      
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 class="navbar-brand" >MyShelterAdminPage</h1>       
    </nav>
  <div class="container">
    <h1>Please log in: </h1>
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
 
   
            <?php
  if ( isset($errMSG) ) {
echo  $errMSG; ?>
             
               <?php
  }
  ?>
           
   
  
    <input  type="email" name="email"  class="form-control" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40" />
       
    <span class="text-danger"><?php  echo $emailError; ?></span >

 
    <input  type="password" name="pass"  class="form-control" placeholder ="Your Password" maxlength="15"  />

   <span  class="text-danger"><?php  echo $passError; ?></span>

    <button class="btn btn-primary" type="submit" name= "btn-login">Sign In</button>
         
   
    <hr>
    <h2>Build an account:</h2>
    <a class="btn btn-primary" href="register.php">Sign Up Here...</a>        
   </form>
  </div>

</body>
</html>
<?php ob_end_flush(); ?>