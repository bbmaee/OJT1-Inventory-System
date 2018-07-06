<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
	<!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
</head>


    <div class="container-fluid">
  
       <!-- Example DataTables Card-->
		<center><h5><br>REPORT  ON THE PHYSICAL COUNT OF PROPERTY PLANT AND EQUIPMENT <br> IT EQUIPMENTS AND SOFTWARE </h5>
		<h6> (Type of Property, Plant and Equipment) <br> As of October 2017 </h6></center>
        <center><h6>For which, <strong><u>ATTY. EDMUNDO R. ALBAY</u>, <u>REGIONAL HR DIRECTOR </u> &nbsp <u> COMMISSION ON HUMAN RIGHTS-REGION XI</u> </strong> is accountable, having a assumed such accountable,on <strong><u>October 2017</u></strong></h6></center>
    <!--<p><a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp(Name of Accountable Officer) &nbsp &nbsp &nbsp (Official designation) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (Agency/Office) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp (Date of assumption)  </a></p> -->
        
        <?php
            // Include config file
            require_once 'config.php';
              
            // Attempt select query execution
            $sql = "SELECT * from stock";
            if($result = $pdo->query($sql)){
                     
			
              echo "<tbody>";   
              echo "<table class='table' id='dataTable' width='100%' cellspacing='0'>";
				echo "<tr>";
						echo "<th>Article</th>";
						echo "<th>Description</th>";
						echo "<th>Property Number</th>";
						echo "<th>Quantity Unit</th>";
						echo "<th>Unit Value</th>";
                        echo "<th><h5><strong>Balance Per Card</strong></h5><br> &nbsp &nbsp Quantity</th>";
                        echo "<th><h5><strong>Balance Per Card</strong></h5> <br> &nbsp &nbsp Value </th>";
                        echo "<th><h5><strong>Onhand Per Count</strong></h5><br> &nbsp &nbsp Quantity</th>";
                        echo "<th><h5><strong>Onhand Per Count</strong></h5> <br> &nbsp &nbsp Value</th>"; 
                        echo "<th><h5><strong>Short/Over</strong></h5><br> &nbsp &nbsp Quantity</th>";
                        echo "<th><h5><strong>Short/Over</strong></h5><br> &nbsp &nbsp &nbsp &nbsp Value</th>";
                        echo "<th>Date</th>";
                        echo "<th>Remarks, State Whereabout, Condition etc.";
				echo "</tr>";
								  
						while($row = $result->fetch()){
								
		
                    echo "<tr>";
						echo "<th>" . $row['article'] . "</th>";
						echo "<th>" . $row['description'] . "</th>";
						echo "<th>" . $row['property_num'] . "</th>";
						echo "<th>" . $row['quantity_unit'] . "</th>";
						echo "<th>" . $row['unit_value'] . "</th>";
						echo "<th>"	. $row['BPC_quantity'] . "</th>";
						echo "<th>"	. $row['BPC_value'] . "</th>";
						echo "<th>"	. $row['OPC_quantity'] . "</th>";
						echo "<th>" . $row['OPC_value']	. "</th>";
						echo "<th>" . $row['SO_quantity']	. "</th>";
						echo "<th>" . $row['SO_value']	. "</th>";
						echo "<th>" . $row['date'] . "</th>";
						echo "<th>" . $row['Remarks'] . "</th>";
                    echo "</tr>";
									
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        
                    } 
                    
                    // Close connection
                    unset($pdo);
                    ?>
			  
             
            </table>
          </div>
          
        </div>
		
    
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}
</script>

<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">


</body>
</html>