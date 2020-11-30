
<!-- Add_จอง -->

<div class="modal fade" id="<?php echo $ward; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo  $wardname; ?></h5>
            </div>
            <div class="modal-body">
                <form id="search_hn" action="" method="POST">
                    <!-- http://172.16.28.169:3000/api/patient/patientinfomation -->
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="hn" id="hn" onkeypress="return isNumberKey(event)" placeholder="ระบุ HN...ที่ต้องการค้นหา ไม่ต้องเติม 0 ข้างหน้า" required />
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
            <hr>
            <div class="search-detail-p" id="result"></div>
            <br>
        </div>
        </form>

        <!-- // ###################test########################### -->

        <!-- // ################test############################## -->


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

        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-primary">Understood</button> -->
            <!-- <button type="button" class="btn btn-secondary btn-block btn-cloce" data-dismiss="modal">ปิด</button> -->
        </div>
    </div>
</div>


<!-- Modal show ที่จองแต่ละที่ รวม -->
<div class="modal fade" id="showlist<?php echo  $ward; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- <div class="modal-dialog-full-width modal-dialog momodel modal-fluid"> -->

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo  "โซน : " . $wardname . " <span class='css-room-modal-show'>( จำนวนจองคงเหลือ " .   $retVal = ($totalsex) ? "$totalsex" : "0"; ?> รายการ)</span></h5>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rw = 0;
                        while ($rowdetail  = mysqli_fetch_array($resdetail)) {
                            $rw++;
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $rw; ?></td>
                                <td class="text-center"> <?php echo $rowdetail['hn']; ?></td>
                                <td class="text-left"> <?php echo $rowdetail['pname'] . "" . $rowdetail['fname'] . "  " . $rowdetail['lname']; ?></td>
                                <td class="text-center"> <?php echo $rowdetail['age']; ?></td>
                                <td class="text-center"> <?php echo $rowdetail['pttype']; ?></td>
                                <td class="text-center"> <?php echo $rowdetail['dateupdate_register']; ?></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

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
<!-- Modal show ที่จองแต่ละที่ รวม -->
<div class="modal fade" id="bed<?php echo  $value->bedno; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- <div class="modal-dialog-full-width modal-dialog momodel modal-fluid"> -->

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo  "โซน : " . $wardname . " <span class='css-room-modal-show'>( จำนวนจองคงเหลือ " .   $retVal = ($totalsex) ? "$totalsex" : "0"; ?> รายการ)</span></h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
            <?php  echo $bbb =  $value->bedno;?>
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
                        $resadd2 = mysqli_query($con,$sql2);
                        $rw = 0;
                       
                        while ($rowadd  = mysqli_fetch_array($resadd2)) {
                            $rw++;
                           
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $rw; ?></td>
                                <td class="text-center"> <?php echo $rowadd['hn']; ?></td>
                                <td class="text-left"> <?php echo $rowadd['pname'] . "" . $rowadd['fname'] . "  " . $rowadd['lname']; ?></td>
                                <td class="text-center"> <?php echo $rowadd['age']; ?></td>
                                <td class="text-center"> <?php echo $rowadd['pttype']; ?></td>
                                <td class="text-center"> <?php echo $rowadd['dateupdate_register']; ?></td>
                                <td class="text-center"><button type="button" class="btn btn-secondary btn-block btn-add" addbed-tooltip="เพิ่มรายการนี้เข้าเตียง"><i class="fa fa-plus" aria-hidden="true"></i><?php echo ' '.$bbb;?></button></td>


                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

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
<!-- ############### -->