<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include "../config/pg_con.class.php";
include "../config/mysql_con.class.php";
$sql = " SELECT b.bedno 
FROM bedno as b
INNER JOIN roomno AS r ON b.roomno = r.roomno
INNER JOIN ward AS w ON w.ward = r.ward
INNER JOIN roomtype AS t ON t.roomtype = r.roomtype
LEFT JOIN room_status_type AS s ON s.room_status_type_id = r.room_status_type_id
LEFT JOIN nondrugitems AS n ON n.icode = b.room_charge_icode
WHERE 1 = 1 
AND t.roomtype = '2' 
AND b.bedtype = '2'
ORDER BY bedno ASC  ";
$query = pg_query($conn, $sql);
 
        //  $rw = 0;
        //  while ($result = pg_fetch_array($query)) {
        //  $rw++;	
        //       $bedno 	=   $result['bedno'];
        //  }  
        //       for ($i = 1; $i <= count($result); $i++) {	
        //       if ($result[$i] != " ") 
        //     echo   $sql = " INSERT INTO vipbed_test (bedno) VALUES ('".$bedno."'); ";
        //       };		   
            $rw = 0;
            while ($result = pg_fetch_array($query)) {
            $rw++;	    
                $bedno 	=   $result['bedno'];
              for($i = 0; $i<= count($result); $i++)// {
                $sql="INSERT INTO vipbed_test (bedno) VALUES ('$bedno')";
                $row = mysqli_query($con, $sql);
                if (!$row) {
                echo "error";
                }
                echo   $sql."<br>";
            }
             //echo $rw."-".$bedno."<br>";
       // }





//  try {
//     if (!file_exists('../config/web_con.class.php'))
//         throw new Exception('ไม่สามารถเข้าถึงข้อมูล');
//     else {
//         require_once('../config/web_con.class.php' );
//         $pdo = sql_con();
//         $rw = 0;
//         while ($result = pg_fetch_array($query)) {
//         $rw++;	
//                 $bedno 	=   $result['bedno'];
          
//             for ($i = 1; $i <= count($result); $i++) {	
//             if ($result[$i] != "") 
//              $sql = " INSERT INTO vipbed_test (bedno) VALUES ('".$bedno."'); ";
//             };		   
// $stmt = $pdo->prepare($sql);
// $stmt->execute();
// echo $rw."-".$bedno." | ";
// header( "location: closescript.php" );
// }
// }
// } catch (Exception $e) {
//     echo '<p><span style="color:red">ERROR : </span><span>' . $e->getMessage() . '</span></p>';
//   header( "location: closescript.php" );
// }
 ?>
 