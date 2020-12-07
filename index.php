<?php
session_start();
include "function/autoload.php";
date_default_timezone_set("Asia/Bangkok");
include "config/mysql_con.class.php";
$sql_countward = " SELECT ward,nameward,COUNT(ward) AS total
FROM vipbed_bedno
GROUP BY ward,nameward
ORDER BY total ";
$wtotal = mysqli_query($con, $sql_countward);
$ward_total = mysqli_num_rows($wtotal);

$sql_sumbed = " SELECT COUNT(bedno) AS totalbed FROM vipbed_bedno ";
$sumbed     = mysqli_query($con, $sql_sumbed);
$rowbed     = mysqli_fetch_array($sumbed);
$totalbed   =  $rowbed['totalbed'];

$sql = " SELECT ward as ward
        ,(SELECT COUNT(*) FROM vipbed_register AS b WHERE b.status_regis = 'Y' AND a.ward = b.ward  ) AS regis_total
        ,(SELECT COUNT(*) FROM vipbed_register AS b WHERE b.status_regis = 'S' AND a.ward = b.ward  ) AS regis_inbed
        FROM vipbed_ward As a ";
$res = mysqli_query($con, $sql);
?>

<?php include "function/header.php"; ?>

<body>
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="#"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
            <div class="nalika-profile">
                <div class="profile-dtl">
                    <a href="#"><img src="<?php echo $logo; ?>" alt="" /></a>
                    <h2>Test <span class="min-dtn">Vip Room</span></h2>
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
                                                        <i class="icon nalika-user"></i>
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
                                            <div class="breadcomb-icon">
                                                <i class="icon nalika-home css-ward"></i>
                                            </div>
                                            <div class="breadcomb-ctn css-ward">

                                                <h2 title="จำนวนโซนห้องพิเศษ">Vip Room Zone ( <span class="vrz"><?php echo $ward_total; ?></span> )</h2>
                                                <p bedtotal-tooltip="จำนวนเตียวพิเศษทั้งหมด">Bed Total ( <span class="bt"><?php echo $totalbed; ?></span> ) <span class="bread-ntd"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
                                            <button data-toggle="" data-placement="" value="ทดสอบ" class="btn btn-info btn-block">
                                                <marquee direction="left"><?php echo $post_news; ?></marquee>
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
                        foreach ($wtotal as $value) {
                            $ward        = $value['ward'];
                            $nameward    = $value['nameward'];
                            $total       = $value['total'];
    
                            foreach($res as $item) {
                                $wardin        = $item['ward'];
                                $regis_total   = $item['regis_total']; 
                                $regis_inbed   = $item['regis_inbed']; 
                                if($wardin == $ward){
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 hover-main" style="margin-bottom: 10px;" onclick="window.location.href = 'bed_register.php?ward=<?php echo $ward; ?>'">
                                <div class="admin-content analysis-progrebar-ctn res-mg-t-15 room-free">
 
                                  <h4 class="text-left text-uppercase "><b><?php echo $nameward; ?></b></h4>
                                     
                                    <div class="row vertical-center-box vertical-center-box-tablet">
                                        <div class="col-xs-3 mar-bot-15 text-left">
                                            <label class="label ">
                                                <span class="beddetf" beddetf-md-tooltip="จำนวนเตียงทั้งหมด">
                                                    <?php echo $total; ?>
                                                </span>
                                                <span class="bedfull" bedfull-md-tooltip="จำนวนเตียงที่ใช้งานอยู่">
                                                    <?php echo $regis_inbed; ?>
                                                </span>
                                                <span class="bednull" null-md-tooltip="จำนวนเตียง ว่าง">
                                                    <?php echo $total - $regis_inbed; ?>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-xs-9 cus-gh-hd-pro">
                                            <h2 class="text-right no-margin total c-p" md-tooltip="จำนวนจอง"><span class="bedq"><?php echo $regis_total; ?></span>
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: <?php echo $regis_inbed * 100 / $total; ?>%" class="progress-bar bg-red"></div>
                                        <!-- <div   style="width: <?php //echo 13 * 0 /100;?>%" class="progress-bar bg-red"></div> -->
                                    </div>
                                </div>
                            </div>
                        <?php
                                }
                             }
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