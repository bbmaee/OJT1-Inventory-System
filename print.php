<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<?php
$sql = 'SELECT * FROM stock';

    $choice = '';

    if(isset($_POST['select'])) {
        
        if($_POST['dropdown'] == 'a') {
            $choice = " WHERE type = 'OFFICE FURNITURE & FIXTURES'";
        }elseif($_POST['dropdown'] == 'b') {
            $choice = " WHERE type = 'IT EQUIPMENTS AND SOFTWARE'";
        }elseif($_POST['dropdown'] == 'c') {
            $choice = " WHERE type = 'OFFICE EQUIPMENTS'";
        }elseif($_POST['dropdown'] == 'd') {
            $choice = " WHERE type = 'AECID EQUIPMENTS'";
        }elseif($_POST['dropdown'] == 'e') {
            $choice = " WHERE type = 'other'";
        }elseif($_POST['dropdown'] == 'f') {
            $choice = "";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

        <meta charset="utf-8">
        <title>CHR REGION XI</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon.png" type="image/png">
	<input style="background-color:MediumSeaGreen;width:300px;height:40px;font-size:23px; margin-left:20px;margin-top:10px;" name="print" type="button" value="Print" id="printButton" onClick="printpage()">
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<style type="text/css" media="print">

@media print {
html,body{height:100%;width:100%;margin:0;padding:0;}
 @page {
	size: A4 landscape;
	max-height:100%;
	max-width:120%
	}
   img {
	width:100%;
	height:100%;
	display:block;
	}
}
</style>  
 
</head>
<div class="container-fluid">
  
  <!-- Example DataTables Card-->
    <center><h5 style="font-size: 30px;">REPORT  ON THE PHYSICAL COUNT OF PROPERTY PLANT AND EQUIPMENT <br> <br><textarea style="text-align:center;width:30%;height:5%;font-size:25px;">IT EQUIPMENTS AND SOFTWARE </textarea>
    <h6> (Type of Property, Plant and Equipment) <br> <textarea style="width:20%;height:40px;text-align:center;font-size:20px">As of October 2017 </textarea></h6></center>
    <textarea style="width:100%;height:50%;font-size:25px;text-align:center;font-size:20px;">For which,  ATTY. EDMUNDO R. ALBAY,  REGIONAL HR DIRECTOR  COMMISSION ON HUMAN RIGHTS-REGION XI  is accountable, having a assumed such accountable, on  October 2017</textarea>
    <!-- <p><a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp(Name of Accountable Officer) &nbsp &nbsp &nbsp (Official designation) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (Agency/Office) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (Date of assumption)  </a></p>
    -->
    <div style='right:0px' class='btn-group' id='printpagebutton' type='button'>
			<form action = 'print1.php' method = 'post'>
			<select name ='dropdown'>
				<option value=''> </option>
				<option value='a'>OFFICE FURNITURE & FIXTURES</option>
				<option value='b'>IT EQUIPMENTS AND SOFTWARE</option>
				<option value='c'>OFFICE EQUIPMENTS</option>
				<option value='d'>AECID EQUIPMENTS</option>
				<option value='e'>OTHERS</option>
				<option value='f'>all</option>
			</select>
				<input type='submit' name='select'>
			</form>
		</div> 
 <?php
                    // Include config file
                    require_once 'config.php';
              
                    // Attempt select query execution
                   if($choice == '') {
                       $sql = "SELECT * from stock";
                   }else {
                       $sql .= $choice;
                   }
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
             echo "<tbody>";	
			  
                            //  echo "<table class='table' id='dataTable' width='100%' cellspacing='0'>";
                              
            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                
             
              echo "<thead>";
   
              echo "<tr>";
              echo "<th><center>Article</center></th>";
              echo "<th>Description</th>";
              echo "<th>Old Property Number</th>";
              echo "<th>New Property Number</th>";
              echo "<th><center>Quantity Unit</center></th>";
              echo "<th><center>Unit Value</center></th>";
              echo "<th><center>Balance Per Card</center></th>";
              echo "<th><center>Balance Per Card</center></th>";
              echo "<th><center>Onhand Per Count</center></th>";
              echo "<th><center>Onhand Per Count</center></th>";
              echo "<th><center>Short/Over</center></th>";
              echo "<th><center>Short/Over</center></th>";
              echo "<th>Date</th>";
              echo "<th>M.R. Issued to</th>";
              echo "<th>Remarks, State Whereabout, Condition etc.";
            echo "</tr>";
            echo "<tr>";
              echo"<th></th>";
              echo"<th></th>";
              echo"<th></th>";
              echo"<th></th>";
              echo"<th></th>";
              echo"<th></th>";
              echo"<th><center>Quantity</center></th>";
              echo"<th><center>Value</center></th>";
              echo"<th><center>Quantity</center></th>";
              echo"<th><center>Value</center></th>";
              echo"<th><center>Quantity</center></th>";
              echo"<th><center>Value</center></th>";
              echo"<th>(yyyy-mm-dd)</th>";
              echo"<th></th>";
              echo"<th></th>";

      echo "</tr>";
    echo "</thead>";
                        
  while($row = $result->fetch()){

                      

      echo "<tr>";
          echo "<th><center>" . $row['article'] . "</center></th>";
          echo "<th>" . $row['description'] . "</th>";
          echo "<th>" . $row['property_num'] . "</th>";
          echo "<th>" . $row['new_property_num'] . "</th>";
          echo "<th><center>" . $row['quantity_unit'] . "</center></th>";
          echo "<th><center>" . $row['unit_value'] . "</center></th>";
          echo "<th><center>"	. $row['BPC_quantity'] . "</center></th>";
          echo "<th><center>"	. $row['BPC_value'] . "</center></th>";
          echo "<th><center>"	. $row['OPC_quantity'] . "</center></th>";
          echo "<th><center>" . $row['OPC_value']	. "</center></th>";
          echo "<th><center>" . $row['SO_quantity']	. "</center></th>";
          echo "<th><center>" . $row['SO_value']	. "</center></th>";
          echo "<th><center>" . $row['date'] . "</center></th>";
          echo "<th>" . $row['issued'] . "</th>";
          echo "<th>" . $row['Remarks'] . "</th>";
  echo "</tr>";
									
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                            echo "<a href class ='btn btn-secondary' href='index.php'>BACK</a>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    unset($pdo);
                    ?>
                   
			  
            </table>
          </div>
        </div>

    
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <!-- Scroll to Top Button-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
</body>
    
<script type="text/javascript">

function printpage() {
document.getElementById('printButton').style.visibility="hidden";
var printButton = document.getElementById("printpagebutton");
printButton.style.visibility = 'hidden';
window.print();
document.getElementById('printButton').style.visibility="visible";
printButton.style.visibility = 'visible';
}
$('#dataTable').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
        
    });
    

</script>

</html>
