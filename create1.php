<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$property_num = $description = $quantity_unit = $unit_value = $BPC_quantity = $BPC_value = $OPC_quantity = $OPC_value =  "";
$property_num_err = $description_err = $quantity_unit_err = $unit_value_err = $BPC_quantity_err = $BPC_value_err = $OPC_quantity_err = $OPC_value_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    /* Validate property_num
    $input_property_num = trim($_POST["property_num"]);
    if(empty($input_property_num)){
        $property_num_err = "Please enter a property_num.";
    } elseif(!filter_var(trim($_POST["property_num"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $property_num_err = 'Please enter a valid property_num.';
    } else{
        $property_num = $input_property_num;
    }
	*/
	
	// Validate property_num
    $input_property_num = trim($_POST["property_num"]);
    if(empty($input_property_num)){
        $property_num_err = 'Please enter an property_num.';     
    } else{
        $property_num = $input_property_num;
    }
    
    
    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = 'Please enter an description.';     
    } else{
        $description = $input_description;
    }
    
    // Validate quantity_unit
    $input_quantity_unit = trim($_POST["quantity_unit"]);
    if(empty($input_quantity_unit)){
        $quantity_unit_err = "Please enter the quantity_unit amount.";     
    } elseif(!ctype_digit($input_quantity_unit)){
        $quantity_unit_err = 'Please enter a positive integer value.';
    } else{
        $quantity_unit = $input_quantity_unit;
    }
	
	// Validate unit_value
    $input_unit_value = trim($_POST["unit_value"]);
    if(empty($input_unit_value)){
        $unit_value_err = "Please enter the unit_value amount.";     
    } elseif(!ctype_digit($input_unit_value)){
        $unit_value_err = 'Please enter a positive integer value.';
    } else{
        $unit_value = $input_unit_value;
    }
	
	// Validate BPC_quantity
    $input_BPC_quantity = trim($_POST["BPC_quantity"]);
    if(empty($input_BPC_quantity)){
        $BPC_quantity_err = "Please enter the BPC_quantity amount.";     
    } elseif(!ctype_digit($input_BPC_quantity)){
        $BPC_quantity_err = 'Please enter a positive integer value.';
    } else{
        $BPC_quantity = $input_BPC_quantity;
    }
	
	// Validate BPC_value
    $input_BPC_value = trim($_POST["BPC_value"]);
    if(empty($input_BPC_value)){
        $BPC_value_err = "Please enter the BPC_value amount.";     
    } elseif(!ctype_digit($input_BPC_value)){
        $BPC_value_err = 'Please enter a positive integer value.';
    } else{
        $BPC_value = $input_BPC_value;
    }
    
	// Validate OPC_quantity
    $input_OPC_quantity = trim($_POST["OPC_quantity"]);
    if(empty($input_OPC_quantity)){
        $OPC_quantity_err = "Please enter the OPC_quantity amount.";     
    } elseif(!ctype_digit($input_OPC_quantity)){
        $OPC_quantity_err = 'Please enter a positive integer value.';
    } else{
        $OPC_quantity = $input_OPC_quantity;
    }
	
	// Validate OPC_value
    $input_OPC_value = trim($_POST["OPC_value"]);
    if(empty($input_OPC_value)){
        $OPC_value_err = "Please enter the OPC_value amount.";     
    } elseif(!ctype_digit($input_OPC_value)){
        $OPC_value_err = 'Please enter a positive integer value.';
    } else{
        $OPC_value = $input_OPC_value;
    }
    
	
    // Check input errors before inserting in database
    if(empty($property_num_err) && empty($description_err) && empty($quantity_unit_err) && empty($unit_value_err) && empty($BPC_quantity_err) && empty($BPC_value_err) && empty($OPC_quantity_err) && empty($OPC_value_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO stock (property_num, description, quantity_unit, unit_value, BPC_quantity, BPC_value, OPC_quantity, OPC_value) VALUES (:property_num, :description, :quantity_unit, :unit_value, :BPC_quantity, :BPC_value, :OPC_quantity, :OPC_value)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':property_num', $param_property_num);
            $stmt->bindParam(':description', $param_description);
            $stmt->bindParam(':quantity_unit', $param_quantity_unit);
			$stmt->bindParam(':unit_value', $param_unit_value);
			$stmt->bindParam(':BPC_quantity', $param_BPC_quantity);
			$stmt->bindParam(':BPC_value', $param_BPC_value);
			$stmt->bindParam(':OPC_quantity', $param_OPC_quantity);
			$stmt->bindParam(':OPC_value', $param_OPC_value);
            
            // Set parameters
            $param_property_num = $property_num;
            $param_description = $description;
            $param_quantity_unit = $quantity_unit;
			$param_unit_value = $unit_value;
			$param_BPC_quantity = $BPC_quantity;
			$param_BPC_value = $BPC_value;
			$param_OPC_quantity = $OPC_quantity;
			$param_OPC_value = $OPC_value;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid"><?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$property_num = $description = $quantity_unit = $unit_value = $BPC_quantity = $BPC_value =  $OPC_quantity = $OPC_value = "";
$property_num_err = $description_err = $quantity_unit_err = $unit_value_err = $BPC_quantity_err = $BPC_value_err = $OPC_quantity_err = $OPC_value_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    /*Validate property_num
    $input_property_num = trim($_POST["property_num"]);
    if(empty($input_property_num)){
        $property_num_err = "Please enter a property_num.";
    } elseif(!filter_var(trim($_POST["property_num"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $property_num_err = 'Please enter a valid property_num.';
    } else{
        $property_num = $input_property_num;
    }
	*/
	
	// Validate property_num
    $input_property_num = trim($_POST["property_num"]);
    if(empty($input_property_num)){
        $property_num_err = 'Please enter an property_num.';     
    } else{
        $property_num = $input_property_num;
    }
    
    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = 'Please enter an description.';     
    } else{
        $description = $input_description;
    }
    
    // Validate quantity_unit
    $input_quantity_unit = trim($_POST["quantity_unit"]);
    if(empty($input_quantity_unit)){
        $quantity_unit_err = "Please enter the quantity_unit amount.";     
    } elseif(!ctype_digit($input_quantity_unit)){
        $quantity_unit_err = 'Please enter a positive integer value.';
    } else{
        $quantity_unit = $input_quantity_unit;
    }
	
	// Validate unit_value
    $input_unit_value = trim($_POST["unit_value"]);
    if(empty($input_unit_value)){
        $unit_value_err = "Please enter the unit_value amount.";     
    } elseif(!ctype_digit($input_unit_value)){
        $unit_value_err = 'Please enter a positive integer value.';
    } else{
        $unit_value = $input_unit_value;
    }
	
	// Validate BPC_quantity
    $input_BPC_quantity = trim($_POST["BPC_quantity"]);
    if(empty($input_BPC_quantity)){
        $BPC_quantity_err = "Please enter the BPC_quantity amount.";     
    } elseif(!ctype_digit($input_BPC_quantity)){
        $BPC_quantity_err = 'Please enter a positive integer value.';
    } else{
        $BPC_quantity = $input_BPC_quantity;
    }
	
	// Validate BPC_value
    $input_BPC_value = trim($_POST["BPC_value"]);
    if(empty($input_BPC_value)){
        $BPC_value_err = "Please enter the BPC_value amount.";     
    } elseif(!ctype_digit($input_BPC_value)){
        $BPC_value_err = 'Please enter a positive integer value.';
    } else{
        $BPC_value = $input_BPC_value;
    }
    
	// Validate OPC_quantity
    $input_OPC_quantity = trim($_POST["OPC_quantity"]);
    if(empty($input_OPC_quantity)){
        $OPC_quantity_err = "Please enter the OPC_quantity amount.";     
    } elseif(!ctype_digit($input_OPC_quantity)){
        $OPC_quantity_err = 'Please enter a positive integer value.';
    } else{
        $OPC_quantity = $input_OPC_quantity;
    }
	
	// Validate OPC_value
    $input_OPC_value = trim($_POST["OPC_value"]);
    if(empty($input_OPC_value)){
        $OPC_value_err = "Please enter the OPC_value amount.";     
    } elseif(!ctype_digit($input_OPC_value)){
        $OPC_value_err = 'Please enter a positive integer value.';
    } else{
        $OPC_value = $input_OPC_value;
    }
    
    // Check input errors before inserting in database
    if(empty($property_num_err) && empty($description_err) && empty($quantity_unit_err) && empty($unit_value_err) && empty($BPC_quantity_err) && empty($BPC_value_err) && empty($OPC_quantity_err) && empty($OPC_value_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO stock (property_num, description, quantity_unit, unit_value, BPC_quantity, BPC_value, OPC_quantity, OPC_value) VALUES (:property_num, :description, :quantity_unit, :unit_value, :BPC_quantity, :BPC_value, :OPC_quantity, :OPC_value)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':property_num', $param_property_num);
            $stmt->bindParam(':description', $param_description);
            $stmt->bindParam(':quantity_unit', $param_quantity_unit);
			$stme->bindParam(':unit_value', $param_unit_value);
			$stme->bindParam(':BPC_quantity', $param_BPC_quantity);
			$stme->bindParam(':BPC_value', $param_BPC_value);
			$stme->bindParam(':OPC_quantity', $param_OPC_quantity);
			$stme->bindParam(':OPC_value', $param_OPC_value);

            // Set parameters
            $param_property_num = $property_num;
            $param_description = $description;
            $param_quantity_unit = $quantity_unit;
			$param_unit_value = $unit_value;
			$param_BPC_quantity = $BPC_quantity;
			$param_BPC_value = $BPC_value;
			$param_OPC_quantity = $OPC_quantity;
			$param_OPC_value = $OPC_value;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>New items/stock</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($property_num_err)) ? 'has-error' : ''; ?>">
                            <label>Property Number</label>
                            <input type="text" name="property_num" class="form-control" value="<?php echo $property_num; ?>">
                            <span class="help-block"><?php echo $property_num_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($quantity_unit_err)) ? 'has-error' : ''; ?>">
                            <label>Quantity Unit</label>
                            <input type="text" name="quantity_unit" class="form-control" value="<?php echo $quantity_unit; ?>">
                            <span class="help-block"><?php echo $quantity_unit_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($unit_value_err)) ? 'has-error' : ''; ?>">
                            <label>Unit Value</label>
                            <input type="text" name="unit_value" class="form-control" value="<?php echo $unit_value; ?>">
                            <span class="help-block"><?php echo $unit_value_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($BPC_quantity_err)) ? 'has-error' : ''; ?>">
                            <label>BPC_Quantity</label>
                            <input type="text" name="BPC_quantity" class="form-control" value="<?php echo $BPC_quantity; ?>">
                            <span class="help-block"><?php echo $BPC_quantity_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($BPC_value_err)) ? 'has-error' : ''; ?>">
                            <label>BPC_Value</label>
                            <input type="text" name="BPC_value" class="form-control" value="<?php echo $BPC_value; ?>">
                            <span class="help-block"><?php echo $BPC_value_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($OPC_quantity_err)) ? 'has-error' : ''; ?>">
                            <label>OPC_Quantity</label>
                            <input type="text" name="OPC_quantity" class="form-control" value="<?php echo $OPC_quantity; ?>">
                            <span class="help-block"><?php echo $OPC_quantity_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($OPC_value_err)) ? 'has-error' : ''; ?>">
                            <label>OPC_Value</label>
                            <input type="text" name="OPC_value" class="form-control" value="<?php echo $OPC_value; ?>">
                            <span class="help-block"><?php echo $OPC_value_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>