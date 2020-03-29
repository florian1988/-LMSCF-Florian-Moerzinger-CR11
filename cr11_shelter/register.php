
<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['members'])!="" ){
 header("Location: user.php" ); // redirects to home.php
}
include_once 'dbconn.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 
$first_name = trim($_POST['first_name']);
$first_name = strip_tags($first_name);
$first_name = htmlspecialchars($first_name);

$last_name = trim($_POST['last_name']);
$last_name = strip_tags($last_name);
$last_name = htmlspecialchars($last_name);
 

$email = trim($_POST[ 'email']);
$email = strip_tags($email);
$email = htmlspecialchars($email);

$pass = trim($_POST['pass']);
$pass = strip_tags($pass);
$pass = htmlspecialchars($pass);

  // basic first_name validation
 if (empty($first_name)) {
  $error = true ;
  $nameError1 = "Please enter your first name.";
 } else if (strlen($first_name) < 3) {
  $error = true;
  $nameError1 = "First name must have at least 3 characters.";
 }


  // basic last_name validation
 if (empty($last_name)) {
  $error = true ;
  $nameError2 = "Please enter your full last name.";
 } else if (strlen($last_name) < 3) {
  $error = true;
  $nameError2 = "Last name must have at least 3 characters.";
 }





 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT email FROM members WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }


 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 4) {
  $error = true;
  $passError = "Password must have atleast 4 characters." ;
 }


 // password hashing for security
$pass = hash('sha256' , $pass);


 // if there's no error, continue to signup
 if( !$error ) {
 
  $query = "INSERT INTO members(first_name, last_name, email, pass) VALUES('$first_name','$last_name','$email','$pass')";
  $res = mysqli_query($conn, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
  unset($first_name);
  unset($last_name);
  unset($email);
  unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }


}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="CSS/main.css">
</head>
<body class="index_b">

    <nav class="navbar navbar-expand-lg navbar-light ">
    <h1 class="navbar-brand" >MyShelterAdminPage</h1>
    </nav>

    <div class="container">
    <h1>Please fill in: </h1>
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
 
     
         
            <?php
   if ( isset($errMSG) ) {
 
   ?>
           <div  class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
       </div>

<?php
  }
  ?>
         
     
         

            <input type ="text"  name="first_name"  class ="form-control"  placeholder ="Enter First Name"  maxlength ="50"   value = "<?php echo $first_name ?>"  />
     
               <span   class = "text-danger" > <?php   echo  $nameError1; ?> </span >


            <input type ="text"  name="last_name"  class ="form-control"  placeholder ="Enter Last Name"  maxlength ="50"   value = "<?php echo $last_name ?>"  />
     
               <span   class = "text-danger" > <?php   echo  $nameError2; ?> </span >
         
   

            <input   type = "email"   name = "email"   class = "form-control"   placeholder = "Enter Your Email"   maxlength = "40"   value = "<?php echo $email ?>"  />
   
               <span   class = "text-danger" > <?php   echo  $emailError; ?> </span >
     
         
     
           
       
            <input   type = "password"   name = "pass"   class = "form-control"   placeholder = "Enter Password"   maxlength = "15"  />
           
               <span   class = "text-danger" > <?php   echo  $passError; ?> </span >
     
         
            <button   type = "submit"   class = "btn  btn-primary"   name = "btn-signup" >Sign Up</button >
            <hr  />
            <h2>Back to log in:</h2>
            <a  class="btn btn-primary" href = "index.php" >Sign in Here...</a>
   
 
   </form >
</body >
</html >
<?php  ob_end_flush(); ?>