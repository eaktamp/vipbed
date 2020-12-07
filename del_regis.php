<?php
include "config/mysql_con.class.php";
date_default_timezone_set('asia/bangkok');
 $id = $_POST['id'];
 $del_datetime  = DATE('Y-m-d H:i:s');
 $del_userupdate = 'USER_DEL';
 $sql = "  UPDATE vipbed_register 
           SET status_regis = 'N',del_datetime = '$del_datetime',del_userupdate = '$del_userupdate' 
           WHERE id = '$id' ";
 $query = mysqli_query($con, $sql);

?>