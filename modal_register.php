<!-- Add_จอง -->

<div class="modal fade" id="<?php echo $ward; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo  $nameward; ?></h5>
            </div>
            <div class="modal-body"style = "background-color: #016738;">
                <form id="search_hn" action="" method="POST">
                    <!-- http://172.16.28.169:3000/api/patient/patientinfomation -->
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" onkeydown="return event.key != 'Enter';" name="hn" id="hn" onkeypress="return isNumberKey(event)" placeholder="ระบุ HN...ที่ต้องการค้นหา ไม่ต้องเติม 0 ข้างหน้า" required />
                            <!-- <input type="hidden" class="form-control" name="ward" id="ward" value="<?php //echo $ward;
                                                                                                        ?>" /> -->
                        </div>

                        <div class="col-sm-3">
                            <input type="button" id="button" value="ค้นหา..." class="btn btn-secondary btn-block btn-submit" />
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">ออกจากหน้านี้</button>
                        </div>
                    </div>
            </div>
            <br>
            <!-- <hr> -->
            <div class="search-detail-p" id="result"></div>
            
            <br>
        </div>
        </form>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script> -->
        <script type="text/javascript">
            $(document).ready(function() {
                function search() {
                    var hn = $("#hn").val();
                    if (hn != "") {
                        $("#result").html
                        $.ajax({
                            type: "POST",
                            url: "search.php?ward=<?php echo $ward; ?>",
                            data: "hn=" + hn,
                            success: function(data) {
                                $("#result").html(data);
                                $("#search").val("");
                            }
                        });
                    }
                }

                $("#button").click(function() {
                    search();
                });
            });
        </script>

        <!-- <div class="modal-footer"> -->
            <!-- <button type="button" class="btn btn-primary">Understood</button> -->
            <!-- <button type="button" class="btn btn-secondary btn-block btn-cloce" data-dismiss="modal">ปิด</button> -->
        <!-- </div> -->
    </div>
</div>


<!-- Modal show ที่จองแต่ละที่ รวม -->
<div class="modal fade" id="showlist<?php echo $ward; ?>">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo  "โซน : " . $nameward . " <span class='css-room-modal-show'>( จำนวนจองคงเหลือ " .   $retVal = ($totalsex) ? "$totalsex" : "0"; ?> รายการ)</span></h5>

            </div>
            <div class="modal-body">

                <table class="table table-hover">
                    <thead>
                        <tr class="head-detail-patient">
                            <th class="text-center" order-tooltip="ลำดับการจอง">ลำดับ</th>
                            <th class="text-center">HN</th>
                            <th class="text-left">ชื่อ นามสกุล</th>
                            <th class="text-center">อายุ</th>
                            <th class="text-center">สิทธิ</th>
                            <th class="text-center">เวลาจอง</th>
                            <th class="text-center">ยกเลิก</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rw = 0;
                        while ($rowdetail  = mysqli_fetch_array($resdetail)) {
                            $id = $rowdetail['id'];
                            $rw++;
                        ?>
                            <script language="JavaScript">
                                function chkConfirm(id) {
                                    if (confirm('คุณต้องการยกเลิกรายการจองนี้ ใช่หรือไม่ ?') == true) {
                                            jQuery.ajax({
                                                type: "POST",
                                                url: "del_regis.php",
                                                data: 'id=' + id,
                                                cache: false,
                                                success: function(response) {
                                                    alert("ยกเลิกรายการจองสำเร็จ");
                                                }
                                            });
                                    } else {
                                        alert('ยังไม่ยกเลิกรายการนี้.');
                                    }
                                }
                            </script>
                  
                            <tr>
                                <form id="delbed" name="delbed" action="#" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                    <td class="text-center"><?php echo $rw; ?></td>
                                    <td class="text-center"> <?php echo $rowdetail['hn']; ?></td>
                                    <td class="text-left"> <?php echo $rowdetail['pname'] . "" . $rowdetail['fname'] . "  " . $rowdetail['lname']; ?></td>
                                    <td class="text-center"> <?php echo $rowdetail['age']; ?></td>
                                    <td class="text-left"> <?php echo $rowdetail['insname']; ?></td>
                                    <td class="text-center"> <?php echo $rowdetail['dateupdate_register']; ?></td>
                                    <td class="text-center"><button OnClick="chkConfirm(<?php echo $id;?>)" type="submit" id="submit_del" name="submit_del" class=" btn btn-secondary btn-block btn-add" addbed-tooltip="ยกเลิกการจอง"> <i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                </form>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- <br> -->
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block btn-cloce" data-dismiss="modal">ปิด</button>
            </div> -->
        </div>
    </div>
</div>




<!-- ################ -->
<!-- Modal show ที่จองแต่ละที่ รวม -->
<div class="modal fade" id="bed<?php echo $bedno; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <!-- <div class="modal-dialog-full-width modal-dialog momodel modal-fluid"> -->

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo  "โซน : " . $nameward . " <span class='css-room-modal-show'>( จำนวนจองคงเหลือ " .   $retVal = ($totalsex) ? "$totalsex" : "0"; ?> รายการ)</span></h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr class="head-detail-patient">
                            <th class="text-center" order-tooltip="ลำดับการจอง">ลำดับ</th>
                            <th class="text-center">HN</th>
                            <th class="text-left">ชื่อ นามสกุล</th>
                            <th class="text-center">อายุ</th>
                            <th class="text-center">สิทธิ</th>
                            <th class="text-center">เวลาจอง</th>
                            <th class="text-center">รับเข้าเตียง</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = " SELECT * FROM vipbed_register WHERE ward = '$ward' AND status_regis = 'Y'  ";
                        $resadd2 = mysqli_query($con, $sql2);
                        $rw = 0;
                        while ($rowadd  = mysqli_fetch_array($resadd2)) {
                            $rw++;

                        ?>

                            <form id="addbed" name="addbed" action="#" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $rowadd['id']; ?>">
                                <input type="hidden" name="hn" id="hn" value="<?php echo $rowadd['hn']; ?>">
                                <input type="hidden" name="ward" id="ward" value="<?php echo $ward; ?>">
                                <input type="hidden" name="bedno" id="bedno" value="<?php echo $bedno; ?>">

                                <tr>
                                    <td class="text-center"><?php echo $rw; ?></td>
                                    <td class="text-center"> <?php echo $rowadd['hn']; ?></td>
                                    <td class="text-left"> <?php echo $rowadd['pname'] . "" . $rowadd['fname'] . "  " . $rowadd['lname']; ?></td>
                                    <td class="text-center"> <?php echo $rowadd['age']; ?></td>
                                    <td class="text-center"> <?php echo $rowadd['pttype']; ?></td>
                                    <td class="text-center"> <?php echo $rowadd['dateupdate_register']; ?></td>
                                    <td class="text-center"><button type="submit" id="submitbed" name="submitbed" onClick="return confirm('คุณต้องการ เข้าห้อง/เตียง นี้ ใช่หรือไม่ ?');" class="btn btn-secondary btn-block btn-add" addbed-tooltip="เพิ่มรายการนี้เข้าเตียง"><i class="fa fa-plus" aria-hidden="true"></i><?php echo ' ' . $bedno; ?></button></td>
                                </tr>
                            </form>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <br>
            <div class="modal-footer">

                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                <button type="button" class="btn btn-secondary btn-block btn-cloce" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

<!-- ################ -->
<!-- Modal show คนใช้เตียง รายละเอียด และการจำหน่าย ออกจากเตียง -->
<div class="modal fade" id="bedfull<?php echo $bedno; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <!-- <div class="modal-dialog-full-width modal-dialog momodel modal-fluid"> -->

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo "ข้อมูลการเข้าใช้ : " . $bedno; ?></h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr class="head-detail-patient">
                            <th class="text-center">HN</th>
                            <th class="text-left">ชื่อ นามสกุล</th>
                            <th class="text-center">อายุ</th>
                            <th class="text-center">สิทธิ</th>
                            <th class="text-center">รับเข้า</th>
                            <th class="text-center">จำหน่าย</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_dch = " SELECT vipbed_register.*,vipbed_pttype.name as pttypename
                                     FROM vipbed_register 
                                     INNER JOIN vipbed_pttype ON vipbed_pttype.pttype = vipbed_register.pttype
                                     WHERE vipbed_register.bedno_in = '$bedno' 
                                     AND vipbed_register.status_regis = 'S' ";
                        $resadd2 = mysqli_query($con, $sql_dch);
                        $rowadd  = mysqli_fetch_array($resadd2);

                        ?>

                        <form id="submitdch" name="submitdch" action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $rowadd['id']; ?>">
                            <input type="hidden" name="ward" id="ward" value="<?php echo $ward; ?>">
                            <input type="hidden" name="bedno" id="bedno" value="<?php echo $bedno; ?>">

                            <tr>
                                <td class="text-center"> <?php echo $rowadd['hn']; ?></td>
                                <td class="text-left"> <?php echo $rowadd['pname'] . "" . $rowadd['fname'] . "  " . $rowadd['lname']; ?></td>
                                <td class="text-center"> <?php echo $rowadd['age']; ?></td>
                                <td class="text-center"> <?php echo $rowadd['pttypename']; ?></td>
                                <td class="text-center"> <?php echo $rowadd['inbed_datetime']; ?></td>
                                <td class="text-center"><button type="submit" id="submit_dch" name="submit_dch" onClick="return confirm('คุณต้องการ จำหน่ายออกจากห้อง ใช่หรือไม่ ?');" class="btn btn-secondary btn-block btn-add" addbed-tooltip="จำหน่ายออกจากห้อง"><i class="fa fa-sign-out" aria-hidden="true"></i></button></td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>

            <br>
            <div class="modal-footer">

                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                <button type="button" class="btn btn-secondary btn-block btn-cloce" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>