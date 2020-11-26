<?php 
$url="http://172.16.28.169:3000/api/room";
$contents = file_get_contents($url); 
//$contents = utf8_encode($contents); 
$results = json_decode($contents); 
// foreach ($results as $key => $value) { 
//     echo "<h2>$key</h2>";
//     foreach ($value as $k => $v) { 
//         echo "$k | $v <br />"; 
//     }
// }
foreach ($results as $key => $value) { 
    
    $ward       = $value->ward;
    $wardname   = $value->wardname;
    $total      = $value->total;
}





// $url="http://172.16.28.169:3000/api/room";
// $contents = file_get_contents($url); 
// $results = json_decode($contents); 
// foreach ($results as $key => $value) { 
//     $ward       = $value->ward;
//     $wardname   = $value->wardname;
//     $total      = $value->total;
// }
?>