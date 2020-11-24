<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
$url = "http://172.16.28.169:3000/api/room";
$contents = file_get_contents($url);
$results = json_decode($contents);
foreach ($results as $k => $v) {
    $total += $v->total;
}
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
                    <a href="#"><img src="img/notification/4.jpg" alt="" /></a>
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
                                                <form role="search" class="">
                                                    <!-- <input type="text" placeholder="Search..." class="form-control"> -->
                                                    <!-- <a href=""><i class="fa fa-search"></i></a> -->
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
                                                <h2 title="จำนวนโซนห้องพิเศษ">Vip Room Zone  ( <span class="vrz"><?php echo count($results); ?></span> )</h2>
                                                <p title="จำนวนเตียวพิเศษทั้งหมด">Bed Total  ( <span class="bt"><?php echo $total; ?></span> ) <span class="bread-ntd"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
                                            <button data-toggle="" data-placement="" value="ทดสอบ" class="btn btn-info">ทดสอบทดสอบทดสอบทดสอบทดสอบ</button>
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
                        foreach ($results as $key => $value) {
                        ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 css-ward " style="margin-bottom: 10px;">
                                <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                                    <h4 class="text-left text-uppercase css-ward"><b><?php echo $value->wardname; ?></b></h4>
                                    <div class="row vertical-center-box vertical-center-box-tablet">
                                        <div class="col-xs-3 mar-bot-15 text-left">
                                            <label class="label bg-green"><?php echo $value->total / 100; ?> %<i class="fa fa-level-up" aria-hidden="true"></i></label>
                                        </div>
                                        <div class="col-xs-9 cus-gh-hd-pro">
                                            <h2 class="text-right no-margin"><?php echo $value->total; ?></h2>
                                        </div>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: <?php echo $value->total + 50; ?>%;" title="ทดสอบ progress" class="progress-bar bg-red"></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include "function/footer.php"; ?>
    </div>
    <?php include "function/js.php"; ?>
</body>

</html>