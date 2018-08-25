<!DOCTYPE html>
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
	    header("Location: index.php");
         }else{
	echo "<center><div style='background-color:#ff6666;width:19.5%;height:20%;' class='form'><h3>Username/password is incorrect.</h3><br/><h4>Click here to <a href='login.php'><u>login</u></h4></a></center></div>";
	}
    }else{
?>
<?php } ?>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>CHRIIS-Login</title>
    <link href="css/sticker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Jura" />
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Jura' type='text/css' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/login.css" rel="stylesheet">
</head>
<style>

    .button {
    width: 50%;
    background-color:#008CBA;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
}
body, html {
    height: 100%;
    margin: 0;
    background-image: url("image/bgim.jpg");
    width:100%;
     background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.login-form {
        width: 500px;
        margin-top:25%;
        float:right;
	}
    .login-form form {
        font-family: Times New Roman, Times, sans-serif;
        font-style: oblique;
    	height:100%;
        background:#F2F2F2;
        color: black;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .stitle{
        margin-left:-27%;
    }
    
.footer {
   position: fixed;
   left: 2%;
   bottom: 2%;
   width: 100%;
   text-align: left;
   font-family: Jura;
   font-size:250%;
}
    
</style>
<body>

    <img style="margin-left:3%;padding-top:2%;float:left;" src="image/loginlogo.png">
        <div style="font-family: Times New Roman, Times, serif;font-size: 30px;float:left;margin-left:1%;color:rgb(234, 209, 0)" class="title">
        <h3 style="padding-top:9%;padding-bottom: 15%;">COMMISSION ON HUMAN RIGHTS <br> REPUBLIC OF THE PHILIPPINES<br>REGIONAL OFFICE XI</h3>
        <div style="font-family: Jura;font-variant: bold;float:left;" class="row">
        <div class="col-6">
                <h1 style="color:rgb(1, 70, 176);font-size:250%;">CHRIIS:</h1>
                <h1 style="color:rgb(1, 92, 176);font-size:250%;margin-top:-5%;">Commission on<br>Human Rights<br>Items Inventory<br>System</h1>
                
        </div> 
        </div>
        
        </div>
        
        <div class="col-sm-6">        
        <div class="login-form">
    <form action="" name="login" method="post">
        <h1 class="text-center"><strong>Log in</strong></h1>       
        <div class="form-group">
            <h2>Username</h2>
            <input type="text" name="username" class="form-control" placeholder="Admin Username" required="required">
        </div>
        <div class="form-group">
            <h2>Password</h2>
            <input type="password" name="password" class="form-control" placeholder="Admin Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"><h4>Log in</h4></button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
        </div>        
    </form>

</div>
<div>
<div class="footer">
        <footer style="color:rgb(1, 92, 176)">Version 1.0<br></footer>
        <a href="dp.html">Developers Information</a>
</div>


</body>
</html>