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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>CHR REGION XI</title>
        <link rel="shortcut icon" href="favicon.png" type="image/png">
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        
  <style>
        .button1 {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: black;
        background-color: rgb(124, 194, 255);
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        margin-right:10px;
        }

        .button1:hover {background-color: rgb(124, 241, 255);}

        .button1:active {
        background-color: white;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
        }
        .button2 {
        display: inline-block;
        padding: 15px 25px;
        font-size: 24px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: black;
        background-color: rgb(124, 194, 255);
        border: none;
        border-radius: 15px;
        box-shadow: 0 9px #999;
        }

        .button2:hover {background-color: rgb(124, 241, 255);}

        .button2:active {
        background-color: white;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
        }
</style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><img src="image/CHRLOGO.png"><strong> COMMISSION ON HUMAN RIGHTS REGION XI</a></strong>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
  
      </ul>
      
 
      
      <ul class="navbar-nav ml-auto">
      <a href="print.php"> <button class="button1">Print</button>
      <a href="create1.php"> <button class="button2">Add New</button>
 
   
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">

            <i style="margin-left:10px;padding-top:20px;" class="fa fa-fw fa-sign-out"></i>Logout</a>

        </li>
        
      </ul>
  </nav>
    <div class="container-fluid">
    
      <!-- Example DataTables Card-->
      <div class="card mb-3">
          <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <h4 align="center"><strong>REPORT ON THE PHYSICAL COUNT OF PROPERTY AND EQUIPMENT</strong></h4>
        </li>
        </ol>
        
        
        
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
             echo" <div style='left:20px' class='btn-group'>
                    <form action = 'index.php' method = 'post'>
                        <select name ='dropdown'>
                            <option value='a'>OFFICE FURNITURE & FIXTURES</option>
                            <option value='b'>IT EQUIPMENTS AND SOFTWARE</option>
                            <option value='c'>OFFICE EQUIPMENTS</option>
                            <option value='d'>AECID EQUIPMENTS</option>
                            <option value='e'>OTHERS</option>
                            <option value='f'>all</option>
                        </select>
                        <input style='background- color:yellow;' type='submit' name='select'>
                    </form>
                    </div>";  

					echo "<div class='col-sm-3'>";
					echo "<form method='POST' action='import.php' enctype='multipart/form-data'>";
						echo "<div class='form-group'>";
							echo "<input type='file' id='file' name='file'>";
						echo "</div>";
					echo "<button type='submit' name='import' class='btn btn-primary btn-sm'>Import</button>";
					echo "</form>";
					
						if(isset($_SESSION['message'])){
							?>
							<div class='alert alert-info text-center' style='margin-top:5px;'>
								<?php echo $_SESSION['message']; ?>
							</div>
							<?php
								unset($_SESSION['message']);
						}

						
					echo "</div>";					
							echo "<div class='card-body'>";
							echo "<div class='table-responsive'>";
              echo "<tbody>";   
              echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
              
             
              echo "<thead>";
   
                      echo "<tr>";
						echo "<th><h5 style='color: blue'><strong>Article</strong></h5></th>";
						echo "<th><h5 style='color: blue'><strong>Description</strong></h5></th>";
						echo "<th><h5 style='color: blue'><strong>Old Property Number</strong></h5></th>";
						echo "<th><h5 style='color: blue'><strong>New Property Number</strong></h5></th>";
						echo "<th><h5 style='color: blue'><strong>Quantity Unit</strong></h5></th>";
						echo "<th><h5 style='color: blue'><strong>Unit Value</strong></h5></th>";
                        echo "<th><h5 style='color: blue'><strong>Balance Per Card</strong></h5></th>";
                        echo "<th><h5 style='color: blue'><strong>Balance Per Card</strong></h5></th>";
                        echo "<th><h5 style='color: blue'><strong>Onhand Per Count</strong></h5></th>";
                        echo "<th><h5 style='color: blue'><strong>Onhand Per Count</strong></h5></th>";
                        echo "<th><h5 style='color: blue'><strong>Short/Over</strong></h5></th>";
                        echo "<th><h5 style='color: blue'><strong>Short/Over</strong></h5</th>";
                        echo "<th><h5 style='color: blue'><strong>Date (y-m-d)</strong></h5></th>";
						echo "<th><h5 style='color: blue'><strong>M.R. Issued to</strong></h5></th>";
						echo "<th><h5 style='color: blue'><strong>Remarks, State Whereabout, Condition etc.</strong></h5></th>";
                        echo "<th><h5 style='color: blue'><strong>Type</strong></h5></th>";
						echo "<th><h5 style='color: blue'><strong>Action</strong></h5></th>";
                      echo "</tr>";
                      echo "<tr>";
						echo"<th></th>";
						echo"<th></th>";
						echo"<th></th>";
						echo"<th></th>";
						echo"<th></th>";
						echo"<th></th>";
						echo"<th>Quantity</th>";
						echo"<th>Value</th>";
						echo"<th>Quantity</th>";
						echo"<th>Value</th>";
						echo"<th>Quantity</th>";
						echo"<th>Value</th>";
						echo"<th></th>";
                        echo"<th></th>";
                        echo"<th></th>";
                        echo"<th></th>";
						echo"<th></th>";
				echo "</tr>";
			  echo "</thead>";
								  
			while($row = $result->fetch()){
								
		
                echo "<tr>";
                    echo "<th>" . $row['article'] . "</th>";
                    echo "<th>" . $row['description'] . "</th>";
					echo "<th>" . $row['property_num'] . "</th>";
					echo "<th>" . $row['new_property_num'] . "</th>";
                    echo "<th>" . $row['quantity_unit'] . "</th>";
					echo "<th>" . $row['unit_value'] . "</th>";
					echo "<th>"	. $row['BPC_quantity'] . "</th>";
					echo "<th>"	. $row['BPC_value'] . "</th>";
					echo "<th>"	. $row['OPC_quantity'] . "</th>";
                    echo "<th>" . $row['OPC_value']	. "</th>";
                    echo "<th>" . $row['SO_quantity']	. "</th>";
                    echo "<th>" . $row['SO_value']	. "</th>";
                    echo "<th>" . $row['date'] . "</th>";
					echo "<th>" . $row['issued'] . "</th>";
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
                            echo "<a href class ='btn btn-secondary' href='index.php'>BACK</a>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    unset($pdo);
                    ?>
                    <a href="exportExcel.php"><h4>Export to Excel</h4></a>
			  
            </table>
          </div>
        </div>

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
            <h5 style="font-size:40px;" class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
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
    <script src="vendor/datatables/jquery.dataTables2.js"></script>
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
