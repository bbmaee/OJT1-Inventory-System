<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once 'config.php';
    
    // Prepare a select statement
    $sql = "SELECT * FROM stock WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':id', $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
               // Retrieve individual field value
					$description = $row["description"];
					$property_num = $row["property_num"];
					$quantity_unit = $row["quantity_unit"];
					$unit_value = $row["unit_value"];
					$BPC_quantity = $row["BPC_quantity"];
					$BPC_value = $row["BPC_value"];
					$OPC_quantity = $row["OPC_quantity"];
					$OPC_value = $row["OPC_value"];
					$SO_quantity = $row["SO_quantity"];
					$SO_value = $row["SO_value"];
					$Remarks = $row["Remarks"];
					$type = $row["type"];
					$date = $row["date"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Contact</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1000px;
            margin-right: 15%;
			margin-top: 5%;
            font-size:30px;
            float: right;
        }
		btn {
			
			background-color: #4CAF51;
			border: none;
			color: white;
			padding: 15px 25px;
			text-align: center;
			font-size: 30px;
			cursor: pointer;
		}

		.button:hover {
			background-color: green;
		}
			</style>

</head>

<body style = "padding-top: 10px;">
		

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="border:7px solid powderblue;box-shadow: 10px 10px 5px grey;border-bottom-left-radius: 50px 20px;border-bottom-left-radius: 25px;padding-bottom:10px;" >
                    <div class="page-header">
                        <h1 style=";font-family:Times new roman times serif;font-size:50px;"><strong>View Items</strong></h1><?php echo $row["type"]; ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 30px">Article:
                    </div>
                    <div class="form-group">
                        <label style="font-size: 30px">Description:</label>
                        <?php echo $row["description"];?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 30px">Property Number:</label>
                        <?php echo $row["property_num"]; ?>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 30px">Quantity Unit:</label>
                        <?php echo $row["quantity_unit"]; ?>
                    </div>
					<div class="form-group">
                        <label style="font-size: 30px">Unit Value:</label>
                        <?php echo $row["unit_value"]; ?>
                    </div>
					<div class="form-group">
                        <label style="font-size: 30px">Balance Per Card - Quantity:</label>
                        <?php echo $row["BPC_quantity"]; ?>
                    </div>
					<div class="form-group">
                        <label style="font-size: 30px">Balance Per Card - Value:</label>
                        <?php echo $row["BPC_value"]; ?>
                    </div>
					<div class="form-group">
                        <label style="font-size: 30px">Onhand Per Count - Quantity:</label>
                        <?php echo $row["OPC_quantity"]; ?>
                    </div>
					<div class="form-group">
                        <label style="font-size: 30px">Onhand Per Count - Value:</label>
                        <?php echo $row["OPC_value"]; ?>
                    </div>
					<div class="form-group">
                        <label style="font-size: 30px">Short/Over - Quantity:</label>
                        <?php echo $row["SO_quantity"]; ?>
                    </div>
					<div class="form-group">
                        <label style="font-size: 30px">Short/Over - Value:</label>
                        <?php echo $row["SO_value"]; ?>
                    </div>
					<div class="form-group">
						<label style="font-size: 30px">Remarks, State Whereabout, Condition etc.:</label>
						<?php echo $row["Remarks"]; ?>
					</div>
					<div class="form-group">
                        <label style="font-size: 30px">Date: </label>
                        <?php echo $row["date"]; ?>
                    </div>
                    <center><a href="tables.php" class="btn btn-primary btn-lg">Back</a></center>
                   
                </div>
            </div>        
        </div>
    </div>
</body>
</html>