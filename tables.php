<?php
//include auth.php file on all secure pages
include("auth.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CHR REGION XI</title>
  <link rel="favicon" type="image/png" href="img/favicon.ico">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="tables.php"><img src="image/CHRLOGO.png"><strong>COMMISSION ON HUMAN RIGHTS REGION XI</a></strong>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
  
      </ul>
		<ul class="navbar-nav ml-auto">
		<a style="margin-right:20px;padding-top: 5px;" class="b" href="print.php"><img src="printy.png">
		<a class="a" href="create1.php"><img src="Add.png">
   
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">

            <i style="margin-left:10px;padding-top:5px;" class="fa fa-fw fa-sign-out"></i>Logout</a>

        </li>
      </ul>
        

  </nav>
   <div><script type="text/javascript">
 function printStock()
    {
        window.open("print.php?","width=520,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes");
    }
 
 function timedMsg()
  {
    var t=setInterval("change_time();",1000);
  }
 function change_time()
 {
   var d = new Date();
   var curr_hour = d.getHours();
   var curr_min = d.getMinutes();
   var curr_sec = d.getSeconds();
   if(curr_hour > 12)
     curr_hour = curr_hour - 12;
   document.getElementById('Hour').innerHTML =curr_hour+':';
    document.getElementById('Minut').innerHTML=curr_min+':';
    document.getElementById('Second').innerHTML=curr_sec;
 }
timedMsg();   
</script></li>

    <div class="container-fluid">
    
      <!-- Example DataTables Card-->
      <div class="card mb-3">
          <ol class="breadcrumb">
          <li class="breadcrumb-item">
		  <h4><strong><a class="btn btn-primary" href="create1.php">Click Here To Add</a>	
          <a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp REPORT ON THE PHYSICAL COUNT OF PROPERTY AND EQUIPMENT</a></strong></h4>
        </li>
        </ol>
        
        <?php
                    // Include config file
                    require_once 'config.php';
              
                    // Attempt select query execution
                   $sql = "SELECT * from stock";
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                     
							echo "<div class='card-body'>";
							echo "<div class='table-responsive'>";
							echo "<tbody>";   
							echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
							  
							  echo "<thead>";
				   
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
										echo "<th>Date(Y-m-d)</th>";
										echo "<th>Remarks, State Whereabout, Condition etc.";
										echo "<th>Type";
										echo "<th>Action</a></th>";
									echo "</tr>";
								echo "</thead>";
												  
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
									echo "<th>" . $row['type'] . "</th>";
 									echo "<td>";
										echo "<a href='delete.php?id=". $row['id'] ."' ><button type='button' class='btn btn-danger'>Delete</button></a>";
										echo "<a href='update.php?id=". $row['id'] ."' ><button type='button' class='btn btn-info'>&nbsp Edit &nbsp</button></a>";
										echo "<a href='read.php?id=". $row['id'] ."' ><button type='button' class='btn btn-success'>&nbsp View&nbsp</button></a>";
										echo "</td>";
									echo "</tr>";
													
									}
							echo "</tbody>";                            
							echo "</table>";
                    // Free result set
                            unset($result);
                       } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
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
		 <div>
          <ol class="breadcrumb">
          <li class="breadcrumb-item">
		  <input class="" name="submit" type="button" value="Print" onClick='printStock()'>
			<table>
				<tr>
					<td>Current time is :</td>
						<td id="Hour" style="color:green;padding-top:50;font-size:large;"></td>
						<td id="Minut" style="color:green;font-size:large;"></td>
						<td id="Second" style="color:green;font-size:large;"></td>
				<tr>
			</table> 
		  </li>
        </ol>
		

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
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
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '/delete.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });


</script>
</html>
