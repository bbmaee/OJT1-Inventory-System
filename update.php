<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$article = $property_num = $description = $quantity_unit = $unit_value = $BPC_quantity = $BPC_value = $OPC_quantity = $OPC_value = $SO_quantity = $SO_value = $date = $Remarks =  "";
$article_err = $property_num_err = $description_err = $quantity_unit_err = $unit_value_err = $BPC_quantity_err = $BPC_value_err = $OPC_quantity_err = $OPC_value_err = $SO_quantity_err = $SO_value_err = $date_err = $Remarks_err = "";
  if(isset($_GET['id'])) {
	  
	  $h_id = $_GET['id'];
  }
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){

    // Get hidden input value
    $id = $_POST["id"];
	
    // Validate article
    $input_article = trim($_POST["article"]);
    if(empty($input_article)){
         $article_err = 'Please enter an article.';     
    } else{
        $article = $input_article;
    }
    
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

    // Validate SO_quantity
    $input_SO_quantity = trim($_POST["SO_quantity"]);
    if(empty($input_SO_quantity)){
        $SO_quantity_err = "Please enter the SO_quantity amount.";     
    } elseif(!ctype_digit($input_SO_quantity)){
        $SO_quantity_err = 'Please enter a positive integer value.';
    } else{
        $SO_quantity = $input_SO_quantity;
    }

        // Validate SO_value
    $input_SO_value = trim($_POST["SO_value"]);
    if(empty($input_SO_value)){
        $SO_value_err = "Please enter the SO_value amount.";     
    } elseif(!ctype_digit($input_SO_value)){
        $SO_value_err = 'Please enter a positive integer value.';
    } else{
        $SO_value = $input_SO_value;
    }
	
	   // Validate date
    $input_date = $_POST['date'];
    if(empty($input_date)){
        $date_err = "Please enter the date.";     
    } else{
        $date = $input_date;
		//('Y-m-d H:i:s')
	}

	 // Validate Remarks
    $input_Remarks = trim($_POST["Remarks"]);
    if(empty($input_Remarks)){
        $Remarks_err = 'Please enter Remarks.';     
    } else{
        $Remarks = $input_Remarks;
    }

   // Check input errors before inserting in database
    if(empty($property_num_err) && empty($description_err) && empty($quantity_unit_err) && empty($unit_value_err) && empty($BPC_quantity_err) && empty($BPC_value_err) && empty($OPC_quantity_err) && empty($OPC_value_err) && empty($SO_quantity_err) && empty($SO_value_err) /*&& empty($date_err)*/ && empty($Remarks_err)){
        // Prepare an insert statement
        $sql = "UPDATE stock SET article = :article, property_num = :property_num, description = :description, quantity_unit = :quantity_unit, unit_value = :unit_value, BPC_quantity = :BPC_quantity, BPC_value = :BPC_value, OPC_quantity = :OPC_quantity, OPC_value = :OPC_value, SO_quantity = :SO_quantity, SO_value = :SO_value, date = :date, Remarks= :Remarks  WHERE id= :id";
		
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
			$stmt->bindParam(':article', $param_article);
            $stmt->bindParam(':property_num', $param_property_num);
            $stmt->bindParam(':description', $param_description);
            $stmt->bindParam(':quantity_unit', $param_quantity_unit);
			$stmt->bindParam(':unit_value', $param_unit_value);
			$stmt->bindParam(':BPC_quantity', $param_BPC_quantity);
			$stmt->bindParam(':BPC_value', $param_BPC_value);
			$stmt->bindParam(':OPC_quantity', $param_OPC_quantity);
            $stmt->bindParam(':OPC_value', $param_OPC_value);
            $stmt->bindParam(':SO_quantity', $param_SO_quantity);
            $stmt->bindParam(':SO_value', $param_SO_value);
            $stmt->bindParam(':date', $param_date);
            $stmt->bindParam(':Remarks', $param_Remarks);
			$stmt->bindParam(':id', $param_id);
            
            // Set parameters
			$param_article = $article;
            $param_property_num = $property_num;
            $param_description = $description;
            $param_quantity_unit = $quantity_unit;
			$param_unit_value = $unit_value;
			$param_BPC_quantity = $BPC_quantity;
			$param_BPC_value = $BPC_value;
			$param_OPC_quantity = $OPC_quantity;
            $param_OPC_value = $OPC_value;
            $param_SO_quantity = $SO_quantity;
            $param_SO_value = $SO_value;
            $param_date = $date;
            $param_Remarks = $Remarks;
			$param_id = $id;
            echo $sql;
            // Attempt to execute the prepared statement
			
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
               header("location: tables.php");
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
    
} else{
    // Check existence of id parameter before processing further
	if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
		// Get URL parameter
		$id = trim($_GET["id"]);
		
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
					$article = $row["article"];
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
                    $date = $row["date"];
					$Remarks = $row["Remarks"];
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
	
	echo $_GET['id'];
	// URL doesn't contain id parameter. Redirect to error page
	// header("location: error.php");
	exit();
}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="form-group <?php echo (!empty($article_err)) ? 'has-error' : ''; ?>">
                            <label>Article</label>
                            <textarea name="article" class="form-control"><?php echo $article; ?></textarea>
                            <span class="help-block"><?php echo $article_err;?></span>
                        </div>

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
                            <label>Balance Per Card - Quantity</label>
                            <input type="text" name="BPC_quantity" class="form-control" value="<?php echo $BPC_quantity; ?>">
                            <span class="help-block"><?php echo $BPC_quantity_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($BPC_quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Balance Per Card - Value</label>
                            <input type="text" name="BPC_value" class="form-control" value="<?php echo $BPC_value; ?>">
                            <span class="help-block"><?php echo $BPC_value_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($OPC_quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Onhand Per Count - Quantity</label>
                            <input type="text" name="OPC_quantity" class="form-control" value="<?php echo $OPC_quantity; ?>">
                            <span class="help-block"><?php echo $OPC_quantity_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($OPC_value_err)) ? 'has-error' : ''; ?>">
                            <label>Onhand Per Count - Value</label>
                            <input type="text" name="OPC_value" class="form-control" value="<?php echo $OPC_value; ?>">
                            <span class="help-block"><?php echo $OPC_value_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($SO_quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Short/Over - Quantity</label>
                            <input type="text" name="SO_quantity" class="form-control" value="<?php echo $SO_quantity; ?>">
                            <span class="help-block"><?php echo $SO_quantity_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SO_value_err)) ? 'has-error' : ''; ?>">
                            <label>Short/Over - Value</label>
                            <input type="text" name="SO_value" class="form-control" value="<?php echo $SO_value; ?>">
                            <span class="help-block"><?php echo $SO_value_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Date</label>
                            <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Remarks_err)) ? 'has-error' : ''; ?>">
                            <label>Remarks, State Whereabout, Condition etc.</label>
                            <input type="text" name="Remarks" class="form-control" value="<?php echo $Remarks; ?>">
                            <span class="help-block"><?php echo $Remarks_err;?></span>
                        </div>
						<input type="hidden" name="id" value="<?php echo $h_id?>">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="tables.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>