<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once 'config.php';
    
    // Prepare a select statement
    $sql = "DELETE FROM stock WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':id', $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CHRIIS-Delete Item</title>
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        
        .wrapper{
            width: 999px;
            margin: 0 auto;
            padding-top:2%;
        }

            </style>
</head>
<body style="background-color:grey;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <center><h1 style="color:white;font-size:400%;"><strong>Delete Item<strong></h1></center>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <center><h2><strong>Are you sure you want to delete this item?</strong></h2></center><br>
                            <center>
                           <input style="width:10%;" type="submit" value="Yes" class="btn btn-danger">
                           <a style="width:10%;" href="index.php" class="btn btn-default">No</a>
                            </center>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>





