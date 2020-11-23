<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include "config/pg_con.class.php";
 $search_hn = $_POST['hn'];
  $hn =  str_pad($search_hn,9,"0",STR_PAD_LEFT);
 $query = "SELECT * FROM patient WHERE hn = '$hn' ";
 $result = pg_query($conn, $query);
 if (pg_num_rows($result) > 0) {
 while ($row = pg_fetch_array($result)) {
    echo $row['hn'];
 }
} else {
    echo "<p style='color:red'>ไม่พบข้อมูล...</p>";
} 
 ?>