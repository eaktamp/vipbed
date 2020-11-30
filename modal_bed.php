
<div class="modal fade" id="bed<?php echo $bedno; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo  "โซน : " . $wardname . " <span class='css-room-modal-show'>( จำนวนจองคงเหลือ " .   $retVal = ($totalsex) ? "$totalsex" : "0"; ?> รายการ)</span></h5>
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
                             $rw = 0;
                        while ($rowadd  = mysqli_fetch_array($resadd)) {
                            $rw++;
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $rw; ?></td>
                                <td class="text-center"> <?php echo $rowadd['hn']; ?></td>
                                <td class="text-left"> <?php echo $rowadd['pname'] . "" . $rowadd['fname'] . "  " . $rowadd['lname']; ?></td>
                                <td class="text-center"> <?php echo $rowadd['age']; ?></td>
                                <td class="text-center"> <?php echo $rowadd['pttype']; ?></td>
                                <td class="text-center"> <?php echo $rowadd['dateupdate_register']; ?></td>
                                <td class="text-center"><button type="submit" id="addbed" onclick=addbed(<?php //echo $; ?>) name="addbed" class="btn btn-secondary btn-block btn-add" addbed-tooltip="เพิ่มรายการนี้เข้าเตียง">
                                <i class="fa fa-plus" aria-hidden="true"></i><?php echo $bedno;?>
                            </button></td>
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
                <button type="button" class="btn btn-secondary btn-block btn-cloce" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>