<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$article = $property_num = $new_property_num = $description = $quantity_unit = $unit_value = $BPC_quantity = $BPC_value = $OPC_quantity = $OPC_value = $SO_quantity = $SO_value = $issued = $Remarks = $type = $date = $image = "";
$property_num_err = $new_property_num_err = $description_err = $quantity_unit_err = $unit_value_err = $BPC_quantity_err = $BPC_value_err = $OPC_quantity_err = $OPC_value_err = $SO_quantity_err = $SO_value_err = $Remarks_err = $type_err = $date_err = $issued_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
		$folder ="uploads/"; 
		$image = $_FILES['image']['name']; 
		$path = $folder . $image ; 
		$target_file=$folder.basename($_FILES["image"]["name"]);
		$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
		$allowed=array('jpeg','png','gif','jpg'); $filename=$_FILES['image']['name']; 
		$ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 
		{ 
		echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
		}
		else{
			move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
		}	

    // Validate article
    $input_article = trim($_POST["article"]);
    if(empty($input_article)){
        $article = $input_article;
    }
    
    // Validate old_property_num
    $input_property_num = trim($_POST["property_num"]);
    if(empty($input_property_num)){
        $property_num = $input_property_num; 
    } else{
        $property_num = $input_property_num;
    }
	
    // Validate new_property_num
    $input_new_property_num = trim($_POST["new_property_num"]);
    if(empty($input_new_property_num)){
        $new_property_num = $input_new_property_num;   
    } else{
        $new_property_num = $input_new_property_num;
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
    } else{
        $OPC_value = $input_OPC_value;
    }

       // Validate SO_quantity
    $input_SO_quantity = $_POST["SO_quantity"];
    if(trim($input_SO_quantity) == ''){
        $SO_quantity = 0;
    }elseif(!ctype_digit($input_SO_quantity)){
        $SO_quantity_err = 'Please enter a positive integer value.';
    }elseif($input_SO_quantity == 0){
		$SO_quantity = $input_SO_quantity;
	}elseif(empty($input_SO_quantity)){
        $SO_quantity_err = "Please enter the SO_quantity amount.";     
    } else{
        $SO_quantity = $input_SO_quantity;
    }

        // Validate SO_value
     $input_SO_value = $_POST["SO_value"];
	if(trim($input_SO_value) == ''){
        $SO_value = 0;
    }elseif(!ctype_digit($input_SO_value)){
        $SO_value_err = 'Please enter a positive integer value.';
    }elseif($input_SO_value == 0){
		$SO_value = $input_SO_value;
	}elseif(empty($input_SO_value)){
        $SO_value_err = "Please enter the SO_value amount.";     
    }else{
        $SO_value = $input_SO_value;
    }
	
	   // Validate date
    $input_date = $_POST['date'];
    if(empty($input_date)){
        $date = $input_date;
    }else{
        $date = $input_date;
		//('Y-m-d')
	}

	// Validate issued
    $input_issued = trim($_POST["issued"]);
    if(empty($input_issued)){
        $issued_err = "Please enter a M.R. Issued to";
    } elseif(!filter_var(trim($_POST["issued"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zñA-Z'-.\s ]+$/")))){
        $issued_err = 'Please enter a valid M.R. Issued.';
    } else{
        $issued = $input_issued;
    }
	
	// Validate Remarks
    $input_Remarks = trim($_POST["Remarks"]);
    if(empty($input_Remarks)){
        $Remarks = $input_Remarks;
    } elseif(!filter_var(trim($_POST["Remarks"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zñA-Z'-.\s ]+$/")))){
        $Remarks_err = 'Please enter a valid Remarks.';
    } else{
        $Remarks = $input_Remarks;
    }
	
	// Validate type
    $input_type = trim($_POST["type"]);
    if(empty($input_type)){
        $type_err = 'Please enter an Categorize.';     
    } else{
        $type = $input_type;
    }
	
    // Check input errors before inserting in database
    if(empty($new_property_num_err) && empty($description_err) && empty($quantity_unit_err) && empty($unit_value_err) && empty($BPC_quantity_err) && empty($BPC_value_err) && empty($OPC_quantity_err) && empty($OPC_value_err) && empty($SO_quantity_err) && empty($SO_value_err) && empty($date_err) && empty($issued_err) && empty($Remarks_err) && empty($type_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO stock (article, property_num, new_property_num, description, quantity_unit, unit_value, BPC_quantity, BPC_value, OPC_quantity, OPC_value, SO_quantity, SO_value, date, issued, Remarks, type, image) VALUES (:article, :property_num, :new_property_num, :description, :quantity_unit, :unit_value, :BPC_quantity, :BPC_value, :OPC_quantity, :OPC_value, :SO_quantity, :SO_value, :date, :issued, :Remarks, :type, :image)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
			$stmt->bindParam(':article', $param_article);
            $stmt->bindParam(':property_num', $param_property_num);
			$stmt->bindParam(':new_property_num', $param_new_property_num);
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
			$stmt->bindParam(':issued', $param_issued);
            $stmt->bindParam(':Remarks', $param_Remarks);
			$stmt->bindParam(':type', $param_type);
			$stmt->bindParam(':image',$param_image); 
            
            // Set parameters
			$param_article = $article;
            $param_property_num = $property_num;
			$param_new_property_num = $new_property_num;
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
			$param_issued = $issued;
            $param_Remarks = $Remarks;
			$param_type = $type;
			$param_image = $image;
            
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
	<link rel="shortcut icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.css">
	<style type="text/css">
        .wrapper{
            width: 900px;
            margin: 0 auto;
        }

/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
    </style>
	</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <center><h2><strong>ADD NEW ITEMS</strong></h2></center>
                    </div>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group <?php echo (!empty($type_err)) ? 'has-error' : ''; ?>">
							<label style="font-size: 20px">Categorize</label>
							<br><h3><input style="width: 50px;height:30px;" type="radio" name="type" <?php if (isset($type) && $type=="OFFICE FURNITURE & FIXTURES") echo "checked";?> value="OFFICE FURNITURE & FIXTURES">OFFICE FURNITURE & FIXTURES
							<br><input style="width: 50px;height:30px;" type="radio" name="type" <?php if (isset($type) && $type=="IT EQUIPMENTS AND SOFTWARE") echo "checked";?> value="IT EQUIPMENTS AND SOFTWARE">IT EQUIPMENTS AND SOFTWARE
							<br><input style="width: 50px;height:30px;" type="radio" name="type" <?php if (isset($type) && $type=="OFFICE EQUIPMENTS") echo "checked";?> value="OFFICE EQUIPMENTS">OFFICE EQUIPMENTS
							<br><input style="width: 50px;height:30px;" type="radio" name="type" <?php if (isset($type) && $type=="AECID EQUIPMENTS") echo "checked";?> value="AECID EQUIPMENTS">AECID EQUIPMENTS
							<br><input style="width: 50px;height:30px;" type="radio" name="type" <?php if (isset($type) && $type=="other") echo "checked";?> value="other">Other </h3>
							<span class="help-block"><?php echo $type_err;?></span>
						</div>
						<div class="form-group ">
                            <label style="font-size: 20px">Image</label>
                            <input style="font-size: 20px" type="file" name="image" value="<?php echo $image; ?>">
                            <span class="help-block"></span>
                        </div>
						<div class="form-group">
                            <label style="font-size: 20px">Article</label>
                            <textarea name="article" class="form-control"><?php echo $article; ?></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($property_num_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Old Property Number</label>
                            <input type="text" name="property_num" class="form-control" value="<?php echo $property_num; ?>">
                            <span class="help-block"><?php echo $property_num_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($new_property_num_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">New Property Number</label>
                            <input type="text" name="new_property_num" class="form-control" value="<?php echo $new_property_num; ?>">
                            <span class="help-block"><?php echo $new_property_num_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($quantity_unit_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Quantity Unit</label>
                            <input type="text" name="quantity_unit" class="form-control" value="<?php echo $quantity_unit; ?>">
                            <span class="help-block"><?php echo $quantity_unit_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($unit_value_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Unit Value</label>
                            <input type="text" name="unit_value" class="form-control" value="<?php echo $unit_value; ?>">
                            <span class="help-block"><?php echo $unit_value_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($BPC_quantity_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Balance Per Card - Quantity</label>
                            <input type="text" name="BPC_quantity" class="form-control" value="<?php echo $BPC_quantity; ?>">
                            <span class="help-block"><?php echo $BPC_quantity_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($BPC_quantity_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Balance Per Card - Value</label>
                            <input type="text" name="BPC_value" class="form-control" value="<?php echo $BPC_value; ?>">
                            <span class="help-block"><?php echo $BPC_value_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($OPC_quantity_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Onhand Per Count - Quantity</label>
                            <input type="text" name="OPC_quantity" class="form-control" value="<?php echo $OPC_quantity; ?>">
                            <span class="help-block"><?php echo $OPC_quantity_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($OPC_value_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Onhand Per Count - Value</label>
                            <input type="text" name="OPC_value" class="form-control" value="<?php echo $OPC_value; ?>">
                            <span class="help-block"><?php echo $OPC_value_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($SO_quantity_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Short/Over - Quantity</label>
                            <input type="text" name="SO_quantity" class="form-control" value="<?php echo $SO_quantity; ?>">
                            <span class="help-block"><?php echo $SO_quantity_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($SO_value_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Short/Over - Value</label>
                            <input type="text" name="SO_value" class="form-control" value="<?php echo $SO_value; ?>">
                            <span class="help-block"><?php echo $SO_value_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Date</label>
                            <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                            <span class="help-block"><?php echo $date_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($issued_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">M.R. Issued to</label>
                            <input type="text" name="issued" class="form-control" value="<?php echo $issued; ?>">
                            <span class="help-block"><?php echo $issued_err;?></span>
                        </div>						
                        <div class="form-group <?php echo (!empty($Remarks_err)) ? 'has-error' : ''; ?>">
                            <label style="font-size: 20px">Remarks, State Whereabout, Condition etc.</label>
                            <input type="text" name="Remarks" class="form-control" value="<?php echo $Remarks; ?>">
                            <span class="help-block"><?php echo $Remarks_err;?></span>
                        </div>

                        <center>
                        <input style="width:150px;height:50px; margin-bottom:20px;font-size: 20px;" type="submit" class="btn btn-primary" value="Submit">
                        <a style="width:150px;height:50px;margin-bottom:20px;font-size: 20px;" href="index.php" class="btn btn-default">Cancel</a>
                        </center>
						</form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>