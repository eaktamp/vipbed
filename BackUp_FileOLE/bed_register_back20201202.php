<?php
session_start();
header('Access-Control-Allow-Origin: *');
include "function/autoload.php";
date_default_timezone_set("Asia/Bangkok");

$ward = $_GET['ward'];
//$url = "http://" . $_SERVER['SERVER_NAME'] . ":3000/api/room/wardbed";
// $url = "http://172.16.28.169:3000/api/room/wardbed" . $ward;
// $contents = file_get_contents($url);
// $results = json_decode($contents);

// foreach ($results as $k => $v) {
//     $wardname = $v->wardname;
//     $total += COUNT($v->bedno);
// }

include "config/mysql_con.class.php";

$sql = " SELECT * -- a.roomno,a.bedno,a.ward_vip,a.ward,a.nameward,a.icode,b.bedid
FROM vipbed_bedno as a
-- LEFT JOIN vipbed_register as b ON b.bedid = a.bedno
WHERE ward = '$ward' ";
$bedin_ward = mysqli_query($con,$sql);
$bedin_total = mysqli_query($con,$sql);
$bed_total = mysqli_num_rows($bedin_total);
$head_wardname  = mysqli_fetch_array($bedin_total);

 $sql = " SELECT * FROM vipbed_register WHERE ward = '$ward' AND status_regis = 'Y'  ";
 $res = mysqli_query($con,$sql);

$resdetail = mysqli_query($con,$sql);
$resadd = mysqli_query($con,$sql);

$row_cnt = mysqli_num_rows($res);
while($row     = mysqli_fetch_array($res)){
    $totalsex += COUNT($row['sex']);
}

?>

<?php include "function/header.php"; ?>


<body>
    <button onclick="topFunction()" id="myBtn" title="กลับบนสุด">Top</button>
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="#"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
            <div class="nalika-profile">
                <div class="profile-dtl">
                    <a href="#"><img src="<?php echo $logo; ?>" alt="" /></a>
                    <h2>VipBed<span class="min-dtn"> Room</span></h2>
                </div>
            </div>
            <?php include "function/menuleft.php"; ?>
        </nav>
    </div>

    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="#"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="icon nalika-menu-task"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
                                                <form role="search" class="headname"><i class="fa fa-heartbeat"></i>&nbsp;&nbsp;<?php echo $hname; ?>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="icon nalika-user" style="color:red"></i>
                                                        <span class="admin-name" title="LogOut ออกจากระบบ">เจ้าหน้าที่จอง</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
                                            <a href="index.php" index-tooltip="กลับเมนูหลัก">
                                                <div class="breadcomb-icon">
                                                    <i class="icon nalika-home css-ward"></i>
                                                </div>
                                            </a>
                                            <div class="breadcomb-ctn css-ward">

                                                <h2 title=""><span class="vrz"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo  $head_wardname['nameward']; ?></span></h2>
                                                <p>Bed Total ( <span class="bt"><?php echo $bed_total; ?></span> ) <span class="bread-ntd"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg- col-md-2 col-sm-2 col-xs-3">
                                        <div class="breadcomb-report">
                                            <!-- <button data-toggle="" data-placement="" value="" class="btn btn-info btn-block">จองห้อง</button> -->
                                        </div>
                                    </div>
                                    <div class="col-lg- col-md-2 col-sm-2 col-xs-3">
                                        <div class="">
                                            <button class="btn btn-block btn-patient-add" data-toggle="modal" data-target="#<?php echo  $ward; ?>"> <i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;จองห้อง</button>
                                        </div>
                                    </div>
                                    <div class="col-lg- col-md-2 col-sm-2 col-xs-3">
                                        <div class="">
                                            <button class="btn btn-block btn-show-add" data-toggle="modal" data-target="#showlist<?php echo  $ward; ?>">
                                                <i class="fa fa-male" aria-hidden="true"></i> 
                                                <i class="fa fa-female" aria-hidden="true"></i> &nbsp;&nbsp;จำนวนจอง &nbsp;&nbsp;<?php echo $row_cnt;?> &nbsp;รายการ

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                        // foreach ($results as $key => $value) {
                        //     $bedno    = $value->bedno;
                        //     $roomname = $value->roomname;
                              foreach($bedin_ward as $item) {
                                     $bedno = $item['bedno'];
                                     $ward_vip = $item['ward_vip'];
                                //  if($bedid = $bedno){
     
                        ?>
                                      
<!-- ######################## -->
                            <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom: 10px;" data-toggle="modal" data-target="#<?php //echo  $value->bedno; ?>"> -->
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 hover-main" style="margin-bottom: 10px;" data-toggle="modal" data-target="#bed<?php echo  $bedno;  ?>">

                                <div class="admin-content analysis-progrebar-ctn res-mg-t-15 room-free">
                                    <h4 class="text-left text-uppercase "><b><?php echo  $bedno . " <span class='css-room'>(" . $ward_vip . ")</span>"; ?></b></h4>
                                    <div class="row vertical-center-box vertical-center-box-tablet">
                                        <div class="col-xs-3 mar-bot-15 text-left">
                                            <label class="label ">
                                                <span class="beddetf" beddetf-md-tooltip="รูปห้อง">
                                                    <i class="fa fa-hospital-o" aria-hidden="true"></i>
                                                    <?php //echo $value->total; 
                                                    ?>
                                                </span>
                                                <span class="bedfull" bedfull-md-tooltip="ค่าใช้จ่ายตามสิทธิ์">
                                                    <?php //echo $value->total; 
                                                    ?>
                                                    <i class="fa fa-cc-visa" aria-hidden="true"></i>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-xs-9 cus-gh-hd-pro">
                                            <h2 class="text-right no-margin total c-p"><?php //echo $regis_total;
                                                                                        ?>
                                                <i class="fa fa-male" aria-hidden="true"></i>
                                                <i class="fa fa-female" aria-hidden="true"></i>
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>

                                            </h2>
                                        </div>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: <?php //echo $value->total * 100 / $badin;
                                                            ?>%" class="progress-bar bg-red"></div>
                                    </div>
                                </div>
                            </div>
                            <?php include "modal_register.php"; ?>



                            <!-- ############### -->
                        <?php
                                 //    }
                           //   }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>



        <br><br><br>
        
        <?php include "function/footer.php"; ?>
    </div>
    <?php include "function/js.php"; ?>
</body>

</html>