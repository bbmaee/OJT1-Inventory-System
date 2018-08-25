<?php
$conn = mysqli_connect("localhost","root","","register");
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

include('config.php');

$name=array();
$query=mysqli_query($conn,"select * from `stock`");
while($row=mysqli_fetch_array($query)){
	$name[]=$row['issued'];
	//header('location: index.php');
}

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($name as $issued) {
        if (stristr($q, substr($issued, 0, $len))) {
            if ($hint === "") {
                $hint = $issued;
            } else {
                $hint .="<br> $issued";
            }
        }
    }
}

echo $hint === "" ? "no items found" : $hint;
?>

