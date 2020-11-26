<!-- Modal รายการที่ถูกจอง -->
<div class="modal fade" id="<?php echo  $value->bedno; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- <div class="modal-dialog-full-width modal-dialog momodel modal-fluid"> -->

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo  $value->bedno . " <span class='css-room-modal-show'>(" . $value->roomname . ")</span>"; ?></h5>
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
                            <th class="text-center">รับเข้าเตียง</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">000075776</td>
                            <td class="text-left">นายทดสอบ คนที่หนึ่ง </td>
                            <td class="text-center">40</td>
                            <td class="text-center"><button type="button" class="btn btn-secondary btn-block btn-add" addbed-tooltip="เพิ่มรายการนี้เข้าเตียง"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">000123456</td>
                            <td class="text-left">นางสาวทดสอบ คนที่สอง</td>
                            <td class="text-center">25</td>
                            <td class="text-center"><button type="button" class="btn btn-secondary btn-block btn-add" addbed-tooltip="เพิ่มรายการนี้เข้าเตียง"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                        </tr>
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



<!-- Add_จอง -->

<div class="modal fade" id="<?php echo $ward; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title head-show-modal-bed" id="staticBackdropLabel"><?php echo  $wardname; ?></h5>
            </div>
            <div class="modal-body">

                <!-- http://172.16.28.169:3000/api/patient/patientinfomation -->


                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="search" placeholder="ระบุ HN...ที่ต้องการค้นหา ไม่ต้องเติม 0 ข้างหน้า" required />
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
                <hr>
            </div>

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function() {

                    function search() {

                        var hn = $("#search").val();

                        if (hn != "") {
                            $("#result").html
                            // ("<img alt="ajax search" src='ajax-loader.gif'/>");
                            $.ajax({
                                type: "post",
                                url: "search.php",
                              //  url: "http://172.16.28.169:3000/api/patient/patientinfomation",
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

                    $('#search').keyup(function(e) {
                        if (e.keyCode == 13) {
                            search();
                        }
                    });
                });
            </script>



            <!-- <form id="frm_search_hn" action="" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="hn" id="hn" placeholder="ระบุ HN...ที่ต้องการค้นหา" required />
                        </div>

                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-secondary btn-block btn-submit" value="submit" name="submit">ค้นหาข้อมูลในระบบ</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">ออกจากหน้านี้</button>
                        </div>
                    </div>
                    <br>
                </form>

            </div>
            <br>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>   
            <script type="text/javascript">
                $(function() {
                    $("#frm_search_hn").on("submit", function(e) {
                        e.preventDefault();
                        var formData = $(this).serialize();
                        $.post("http://172.16.28.169:3000/api/patient/patientinfomation", formData, function(data) {
                            console.log();
                            $("#noote").html('<span class="modal_js">'+hn+'</span>');
                        });
                    });
                });
            </script>
         	<span id="noote"> </span> -->

            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                <!-- <button type="button" class="btn btn-secondary btn-block btn-cloce" data-dismiss="modal">ปิด</button> -->
            </div>
        </div>
    </div>
</div>