<?php
include_once "_autoload.php";
?>
<?php include_once "header.php" ?>
<body>
<!-- HEADER END-->
<?php require_once "header-logo-bar.php"; ?>
<!-- LOGO HEADER END-->
<?php require_once "header-menu.php"; ?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-one">
                <i class="fa fa-folder dashboard-div-icon"></i>

                <div class="progress progress-striped active">
                    <div style="width: 70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"
                         class="progress-bar progress-bar-danger">
                    </div>
                </div>
                <h5>
                    <a class="link-a" href="<?php echo BASE_URL ?>role/">Roles</a>
                </h5>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-two">
                <i class="fa fa-facebook-square dashboard-div-icon"></i>

                <div class="progress progress-striped active">
                    <div style="width: 70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"
                         class="progress-bar progress-bar-danger">
                    </div>
                </div>
                <h5>
                    <a class="link-a" href="<?php echo BASE_URL ?>user/">Users</a>
                </h5>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-three">
                <i class="fa fa-camera-retro dashboard-div-icon"></i>

                <div class="progress progress-striped active">
                    <div style="width: 70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"
                         class="progress-bar progress-bar-danger">
                    </div>
                </div>
                <h5>
                    <a class="link-a" href="<?php echo BASE_URL ?>gallery/">Gallery</a>
                </h5>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-four">
                <i class="fa fa-key dashboard-div-icon"></i>

                <div class="progress progress-striped active">
                    <div style="width: 70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"
                         class="progress-bar progress-bar-danger">
                    </div>
                </div>
                <h5>
                    <a class="link-a" href="<?php echo BASE_URL ?>article/">News</a>
                </h5>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-five">
                <i class="fa fa-bell-o dashboard-div-icon"></i>

                <div class="progress progress-striped active">
                    <div style="width: 70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"
                         class="progress-bar progress-bar-danger">
                    </div>
                </div>
                <h5>
                    <a class="link-a" href="<?php echo BASE_URL ?>onlinetest/startTest/index.php">Online Test</a>
                </h5>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-six">
                <i class="fa fa-cogs dashboard-div-icon"></i>

                <div class="progress progress-striped active">
                    <div style="width: 70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"
                         class="progress-bar progress-bar-danger">
                    </div>
                </div>
                <h5>
                    <a class="link-a" href="<?php echo BASE_URL ?>tagcloud/">TagCloud</a>
                </h5>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require_once "footer.php"; ?>
<!-- FOOTER SECTION END-->
