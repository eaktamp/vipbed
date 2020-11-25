<?php
$sql = " SELECT ward,regis_total FROM vipbed_ward ";
$res=mysqli_query($con,$sql);
foreach($res as $item) {
	$ward = $item['ward'];
	$regis_total   = $item['regis_total']; 
}
?>