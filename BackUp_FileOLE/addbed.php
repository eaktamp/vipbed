<?php
session_start();
header('Content-Type: application/json');
date_default_timezone_set('asia/bangkok');
include("config/mysql_con.class.php");
$id            = $_POST['id'];
$roomid        = $_POST['ward'];
$bedno_in      = $_POST['bed_main'];
$inbed_datetime = DATE('Y-m-d H:i:s');
$inbed_userupdate = 'User_Update';
$status_regis = "S";


$sql = " UPDATE vipbed_register
         SET roomid  = '$roomid', 
             bedno_in  = '$bedno_in', 
             status_regis = 'S', 
             an = '$an',
             inbed_datetime = '$inbed_datetime',
             inbed_userupdate = '$inbed_userupdate'
         WHERE id = $id ";
$query = mysqli_query($con, $sql);

if ($query) {
    echo json_encode(array('status' => '1', 'message' => 'รับเข้าห้องพิเศษแล้ว'));
} else {
    echo json_encode(array('status' => '0', 'message' => 'error บันทึกผิดพลาด กรุณาตรวจสอบข้อมูล!'));
}
