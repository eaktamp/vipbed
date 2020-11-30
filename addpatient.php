<?php
session_start();
header('Content-Type: application/json');
date_default_timezone_set('asia/bangkok');
include("config/mysql_con.class.php"); 

    $ward	= $_POST['ward'];
	$pname	= $_POST['pname'];
	$fname	= $_POST['fname'];
	$lname	= $_POST['lname'];
	$hn	    = $_POST['hn'];
	$sex    = $_POST['sex'];
	$cid    = $_POST['cid'];
	$pttype    	= $_POST['pttype'];
	$birthday  	= $_POST['birthday'];
	$age 		 = $_POST['age'];
	$userupdate_register = "Test";
	$status_regis = "Y";
	

$sql = " INSERT INTO vipbed_register (ward,pname,fname,lname,hn,sex,cid,pttype,birthday,age,userupdate_register,status_regis)
          values('$ward','$pname','$fname','$lname','$hn','$sex','$cid','$pttype','$birthday','$age','$userupdate_register','$status_regis') ";
$query = mysqli_query($con,$sql);

 //echo json_encode(array('status' => '1','message'=> "$sql"));

if($query) {
	echo json_encode(array('status' => '1','message'=> 'บันทึกรายการสำเร็จ'));
	
	
}
else
{
	echo json_encode(array('status' => '0','message'=> 'error บันทึกผิดพลาด กรุณาตรวจสอบข้อมูล!'));
}
?>