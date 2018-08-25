<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<?php
// Include config file
require_once 'config.php';

$stmt=$pdo->prepare("select article as 'Article', description as 'Description', property_num as 'Old Property Number', new_property_num as 'New Property Number', quantity_unit as 'Quantity Unit', unit_value as 'Unit Value', BPC_quantity as 'Balance Per Card-Quantity', BPC_value as 'Balance Per Card-Value', OPC_quantity as 'Onhand Per Count-Quantity', OPC_value as 'Onhand Per Count-Value', SO_quantity as 'Short/Over-Quantity', SO_value as 'Short/Over-Value', date as 'Date', issued as 'Issued to', Remarks as 'Remarks' from stock order by type");
$stmt->execute();

$columnHeader1 ='';
$columnHeader = "REPORT ON PHYSICAL COUNT OF PROPERTY, PLANT & EQUIPMENT";
$columnHeader1 = "(Type of Property, Plant and Equipment)";
$columnHeader2 = "(Date)";
$columnHeader3 = "Article"."\t"."Description"."\t"."Old Property Number"."\t"."New Property Number"."\t"."Quantity Unit"."\t"."Unit Value"."\t"."Balance Per Card"."\t"."Balance Per Card"."\t"."Onhand Per Count"."\t"."Onhand Per Count"."\t"."Short/Over"."\t"."Short/Over"."\t"."Date"."\t"."Issued to"."\t"."Remarks"."\t";
$columnHeader4 = "\t"."\t"."Number"."\t"."Number"."\t"."\t"."\t"."Quantity"."\t"."Value"."\t"."Quantity"."\t"."Value"."\t"."Quantity"."\t"."Value"."\t"."\t"."\t";

$setData='';

while($rec =$stmt->FETCH(PDO::FETCH_ASSOC))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=CHR Inventory.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n".($columnHeader1)."\n".($columnHeader2)."\n".($columnHeader3)."\n".($columnHeader4)."\n".$setData."\n";

?>
