<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
      body{
          background-color: #000;
          color: #1FD833;
      }
    </style>
</head>
<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include "../config/pg_con.class.php";
include "../config/mysql_con.class.php";
$sql = " SELECT pttype,name,pcode,hipdata_code,nhso_code,paidst FROM pttype  ";
$query = pg_query($conn, $sql);

$sql_clear = " TRUNCATE TABLE vipbed_pttype ";
mysqli_query($con, $sql_clear);
    $rw = 0;
while ($result = pg_fetch_array($query)) {
    $rw++;
 $sumrw = $rw;
    $pttype         =   $result['pttype'];
    $name           =   $result['name'];
    $pcode          =   $result['pcode'];
    $hipdata_code   =   $result['hipdata_code'];
    $nhso_code      =   $result['nhso_code'];
    $paidst         =   $result['paidst'];
    $dateupdate     =   DATE('Y-m-d H:i:s');
    $userupdate     =   "ApiService";

    for ($i = 0; $i <= count($result); $i++)
        $sql = " INSERT INTO vipbed_pttype (pttype,name,pcode,hipdata_code,nhso_code,paidst,dateupdate,userupdate) 
                 VALUES ('$pttype','$name','$pcode','$hipdata_code','$nhso_code','$paidst','$dateupdate','$userupdate') ";
    $row = mysqli_query($con, $sql);
    if (!$row) {
        echo "error";
    }
    //echo   "Api Service Pttype <br>";
    
    // echo   "[{".MD5($rw)."".MD5($sql)."}]";  
    // echo   "[{".MD5($rw)."".MD5($sql)."}]";

}   
?>
<body>
    



</body>
</html>