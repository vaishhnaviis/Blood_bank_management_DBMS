<?php
include '../config.php';
$sel = "SELECT SUM(unit) FROM bloodgroup";
$rs = $con->query($sel);
$rws = $rs->fetch_assoc();
$totalStock = $rws['SUM(unit)'];

echo json_encode(array('totalStock' => $totalStock));
?>
