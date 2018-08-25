<?php

	session_start();
	//connection
	$conn = new mysqli('localhost', 'root', '', 'register');
	
	if(isset($_POST['import'])){
		//check if input file is empty
		if(!empty($_FILES['file']['name'])){
			$filename = $_FILES['file']['tmp_name'];
			$fileinfo = pathinfo($_FILES['file']['name']);
			
		if (!isset($impData[14])) {
			$impData[14] = '';
		} else{
			$impData[14] = $impData[14];
		}
			//check file extension
		if(strtolower($fileinfo['extension']) == 'csv' || 'xlsx'){
				
				//check if file contains data
				if($_FILES['file']['size'] > 0){
	
					$file = fopen($filename, 'r');
						
					while(($impData = fgetcsv($file, 1000, ',')) !== FALSE){
						$sql = "INSERT INTO stock (description, property_num, new_property_num, quantity_unit, unit_value, BPC_quantity, BPC_value, OPC_quantity, OPC_value, SO_quantity, SO_value, date,issued, Remarks, type) VALUES ('".$impData[0]."', '".$impData[1]."', '".$impData[2]."', '".$impData[3]."', '".$impData[4]."', '".$impData[5]."', '".$impData[6]."', '".$impData[7]."', '".$impData[8]."', '".$impData[9]."', '".$impData[10]."', '".$impData[11]."', '".$impData[12]."', '".$impData[13]."', '".$impData[14]."')";
						$query = $conn->query($sql);

						if($query){
							$_SESSION['message'] = "Data imported successfully";
						}
						else{
							$_SESSION['message'] = "Cannot import data. Something went wrong";
						}
					}
					header('location: index.php');
					
				}
				else{
					$_SESSION['message'] = "File contains empty data";
					header('location: index.php');
				}
			}
			else{
				$_SESSION['message'] = "Please upload CSV or XLSX files only";
				header('location: index.php');
			}
		}
		else{
			$_SESSION['message'] = "File empty";
			header('location: index.php');
		}

	}

	else{
		$_SESSION['message'] = "Please import a file first";
		header('location: index.php');
	} 
 
?>