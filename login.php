<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CHR REGION XI</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin2.css" rel="stylesheet">
  

</head>
<body background="image/CHRLOGO.png"></body>
<body class="bg-dark">
	


 <div class="container" >

    <div class="card card-login mx-auto mt-5" >
      <div class="card-header">Login</div>
      <div class="card-body">
      <div class="form">

<form action="" method="post" name="login">

<label for="exampleInputEmail1"><h5>Email address</label></h5>

<input type="text" name="username" placeholder="Username" required />
<br>
<label for="exampleInputPassword1"><h5>Password</h5></label>
<br>
<input type="password" name="password" placeholder="Password" required />
<br>
<input type="checkbox"> Remember Password</label>
<br>
<input name="submit" type="submit" value="Login" />
<br>
</form>
</div>
  
      </div>
    </div>
  </div>
  

<body>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: tables.php");
         }else{
	echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>

<?php } ?>
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>