<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include "config/pg_con.class.php";
$ward = $_GET['ward'];
$search_hn = $_POST['hn'];
$hn =  str_pad($search_hn, 9, "0", STR_PAD_LEFT);
$query = " SELECT pt.hn,pt.cid AS personal_id,pname,fname,lname,sex AS gender,
 CASE WHEN sex = '1' THEN 'ชาย' ELSE 'หญิง' END AS gender_text
 ,pt.pttype,pt.birthday,pt.sex,pt.cid
 ,EXTRACT(YEAR FROM AGE (pt.birthday)) AS age	
 ,cz.emp_citizenship_name AS citizen
 ,pt.addrpart,pt.moopart,pt.tmbpart,pt.amppart,pt.chwpart
 ,concat(pt.addrpart,' หมู่ ',pt.moopart,ta.full_name) AS fulladdress,
 pt.po_code AS post_code,   mobile_phone_number ,death ,fathername,pt.motherlname
 ,firstday AS firstvisit
 ,marrystatus,mt.name AS marryname,type_area,pp.name AS ppname
 FROM patient pt
 LEFT JOIN pttype pp ON pp.pttype = pt.pttype
 LEFT JOIN emp_citizenship cz ON cz.emp_citizenship_id  = pt.citizenship
 LEFT JOIN marrystatus mt ON mt.code = pt.marrystatus
 LEFT JOIN thaiaddress ta ON ta.addressid = concat(pt.chwpart,pt.amppart,pt.tmbpart) WHERE hn= '$hn' ";
$result = pg_query($conn, $query);
if (pg_num_rows($result) > 0) {
	$row     		= pg_fetch_array($result);
	$hn      		= $row['hn'];
	$pname   		= $row['pname'];
	$fname   		= $row['fname'];
	$lname   		= $row['lname'];
	$gender_text 	= $row['gender_text'];
	$ppname  		= $row['ppname'];
	$sex  			= $row['sex'];
	$cid  			= $row['cid'];
	$pttype  		= $row['pttype'];
	$birthday  		= $row['birthday'];
	$age  			= $row['age'];
?>
	<form id="addpatient" name="addpatient" action="" method="POST">
		<input type="hidden" name="ward" id="ward" value="<?php echo $ward; ?>">
		<input type="hidden" name="hn" id="hn" value="<?php echo $hn; ?>">
		<input type="hidden" name="pname" id="pname" value="<?php echo $pname; ?>">
		<input type="hidden" name="fname" id="fname" value="<?php echo $fname; ?>">
		<input type="hidden" name="lname" id="lname" value="<?php echo $lname; ?>">
		<input type="hidden" name="gender_text" id="gender_text" value="<?php echo $gender_text; ?>">
		<input type="hidden" name="ppname" id="ppname" value="<?php echo $ppname; ?>">
		<input type="hidden" name="sex" id="sex" value="<?php echo $sex; ?>">
		<input type="hidden" name="cid" id="cid" value="<?php echo $cid; ?>">
		<input type="hidden" name="pttype" id="pttype" value="<?php echo $pttype; ?>">
		<input type="hidden" name="birthday" id="birthday" value="<?php echo $birthday; ?>">
		<input type="hidden" name="age" id="age" value="<?php echo $age; ?>">
		<form>

			<table class="styled-table">
				<tbody>
					<tr class="active-row">
						<td class="text-left"><?php echo " HN : ".$hn; ?></td>
						<td class="text-left"><?php echo " ชื่อ-สกุล : " . $pname . "" . $fname . " " . $lname; ?></td>
						<td class="text-left"><?php echo " อายุ (ปี) : " . $age; ?></td>
						<td class="text-left"><?php echo " เพศ : " . $gender_text; ?></td>
						<td class="text-left"><?php echo " สิทธิการักษา : ".$row['ppname']; ?></td>
					</tr>
					<!-- <tr class="active-row">
						<td class="text-left"><?php// echo " สิทธิการักษา : ".$row['ppname']; ?></td>
						<td class="text-left"><?php //echo " " . $pname . "" . $fname . " " . $lname; ?></td>
						<td class="text-left"><?php //echo " " . $pname . "" . $fname . " " . $lname; ?></td>
						<td class="text-left"><?php //echo " " . $pname . "" . $fname . " " . $lname; ?></td>
					</tr> -->
				</tbody>
			</table>
			<!-- <br> -->



			<button type="submit" class="btn btn-select" id="submit_regis" value="" name="submit_regis" bedfull-md-tooltip="คลิกเพื่อจอง">
					+ จอง +
				<?php //echo $hn; 
				?>
				<?php //echo " ". $fname . " " . $lname; 
				?>
				<?php //echo  " " . $row['gender_text']; 
				?>
				<?php //echo  " " . $row['ppname']; 
				?>
				
			</button>

		<?php

	} else {
		echo "<p style='color:red'>ไม่พบข้อมูล...</p>";
	}
		?>

		<script type="text/javascript">
			// function Addpatient(){
			//     alert("Test");
			// }

			$(document).ready(function() {
				$("#submit_regis").click(function(e) {
					e.preventDefault();
					$.ajax({
						type: "POST",
						url: "addpatient.php",
						data: $("#addpatient").serialize(),
						success: function(result) {
							//console.log(result);
							if (result.status == 1) {

								//alert(result.message);
								Swal.fire({
									icon: "success",
									title: "จองห้อง สำเร็จ",
									text: result.message,
									type: "success"
								}).then(function() {
									location.reload();
								});

							} else {
								alert(result.message);
								//	window.location.href = 'test.php';
							}
						}
					});
				});

			});
		</script>