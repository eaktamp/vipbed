<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include "config/pg_con.class.php";
$search_hn = $_POST['hn'];
$hn =  str_pad($search_hn, 9, "0", STR_PAD_LEFT);
$query = " SELECT hn,cid as personal_id,pname,fname,lname,sex as gender,
 case when sex = '1' then 'ชาย' else 'หญิง' END as gender_text
 ,cz.emp_citizenship_name as citizen,pt.addrpart,pt.moopart,pt.tmbpart,pt.amppart,pt.chwpart,concat(pt.addrpart,' หมู่ ',pt.moopart,ta.full_name) as fulladdress,
 pt.po_code as post_code,   mobile_phone_number ,death ,fathername,pt.motherlname,firstday as firstvisit,marrystatus,mt.name as marryname,type_area,pp.name as ppname
 FROM patient pt
 LEFT JOIN pttype pp on pp.pttype = pt.pttype
 LEFT JOIN emp_citizenship cz on cz.emp_citizenship_id  = pt.citizenship
 LEFT JOIN marrystatus mt on mt.code = pt.marrystatus
 LEFT JOIN thaiaddress ta on ta.addressid = concat(pt.chwpart,pt.amppart,pt.tmbpart) where hn= '$hn' ";
$result = pg_query($conn, $query);
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_array($result)) {
        // echo $row['hn'];
?>
        <table class="table table-hover">
                <tr class="search-detail-p">
                    <td class="text-center"><?php echo $row['hn']; ?></td>
                    <td class="text-left"><?php echo $row['pname'] . "" . $row['fname'] . " " . $row['lname']; ?></td>
                    <td class="text-center"><?php echo $row['personal_id']; ?></td>
                    <td class="text-center"><?php echo $row['gender_text']; ?></td>
                    <td class="text-center"><?php echo $row['ppname']; ?></td>
                </tr>
        </table>

        <!-- <button type="submit" class="btn btn-secondary btn-block btn-submit" value="submit" name="submit">ค้นหาข้อมูลในระบบ</button> -->
<?php 
}
} else {
    echo "<p style='color:red'>ไม่พบข้อมูล...</p>";
}
?>