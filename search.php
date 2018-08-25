<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Searched</title>
<link rel="stylesheet" href="css/style2.css"/>
<link rel="stylesheet" href="css/style1.css"/>
	<style type="text/css">
        .wrapper{
            width: 1000px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
        
ul {
    font-family: high tower text;
    font-size: 45px;
    margin: 0;
    padding: 0;
    list-style: none;
}
ul li {
    display: block;
    position: relative;
    float: left;
}
li ul {
    display: none;
}
ul li a {
    display: block;
    text-decoration: none;
    color: #ffffff;
    padding: 5px 15px 5px 15px;
    background-color: rgb(61, 109, 122);
    white-space: nowrap;
}
ul li a:hover {
background: white;
}
li:hover ul {
    display: block;
}
li:hover li {
    float: none;
    font-size: 25px;
    color: aliceblue;
}
li:hover a { background: rgb(167, 200, 209); }
li:hover li a:hover {
    background: white;
}
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>

<body>
<div class="container">
    <form action="search.php" method="get" name="searchbar">
            <input type="text" style="width: 300px" name="search" placeholder="Search"/>
            <br><input type="radio" name="searchby" value="a" checked id="a"/><h11>OFFICE FURNITURE & FIXTURES</h11>
            <br><input type="radio" name="searchby" value="b" id="b"/><h11>IT EQUIPMENTS AND SOFTWARE</h11>
            <br><input type="radio" name="searchby" value="c" id="c"/><h11>OFFICE EQUIPMENTS</h11>
            <br><input type="radio" name="searchby" value="d" id="d"/><h11>AECID EQUIPMENTS</h11>
            <br><input type="radio" name="searchby" value="e" id="e"/><h11>Other</h11>
            <br><input type="radio" name="searchby" value="f" id="f"/><h11>All</h11>
            <input name="submit" type="submit" value="Search" />
         </form>
	</div>
</div>
    
<div class="topnav_z">
    
</div> 
    
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left"></h2>
                        <a href="index.php" class="btn btn-success pull-right">back to contacts</a>
                    </div>
                    <?php   
if (isset($_GET['submit'])) {

$searcht = $_GET['search'];
$a= $_GET['searchby'];
$b = $_GET['searchby'];
$c = $_GET['searchby'];
$d = $_GET['searchby'];
$e = $_GET['searchby'];
$f = $_GET['searchby'];
$ser = $_GET['searchby'];

  
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "use register";
if ($conn->query($sql) === TRUE) {
}
else if($a != null){
    echo "Sorted by "."$a"; 
    $ser = $a;
}
else if($b != null){
    echo "Sorted by "."$b"; 
    $ser = $b;
}    
else if($c != null){
    echo "Sorted by "."$c"; 
    $ser = $c;
} 
else if($d != null){
    echo "Sorted by "."$d"; 
    $ser = $d;
}    
else if($e != null){
    echo "Sorted by "."$e"; 
    $ser = $e;
}
else if($f != null){
    echo "Sorted by "."$f"; 
    $ser = $f;
}    
    
$sql = "select * from stock where $ser like '%$searcht%'";
    $result = $conn->query($sql);
            if($result->num_rows > 0){
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
            echo "<tbody>";
            while($row = $result->fetch_assoc()){
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
                        }
                    }
        
?> 
                </div>
            </div>        
        </div>
    </div>
</body>
</html>