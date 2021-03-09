<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 30.10.2015
 * Time: 20:47
 */
include_once "../_autoload.php";
include BASE_DIR . "role/Role.php";
?>
<?php include_once BASE_DIR . "header.php" ?>
<body>
<!-- HEADER END-->
<?php require_once BASE_DIR . "header-logo-bar.php"; ?>
<!-- LOGO HEADER END-->
<?php require_once BASE_DIR . "header-menu.php"; ?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
<?php
$role = new Role();
if (!empty($_POST['action'])) {
    if (isset($_POST['role']) && !empty($_POST['role'])&&isset($_GET['edit'])) {
        $result = $role->putRole('role', $_GET['edit'],$_POST['role']);
        echo '<div class="alert alert-success">' . $result . '</div>';
    } else {
        echo '<div class="alert alert-danger">Enter role name</div>';
    }
}
?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Role
                        <div class="pull-right">
                            <a class="btn btn-default" href="index.php">
                                <i class="fa fa-list"></i> Roles list
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="edit-role.php?<?php echo $_SERVER['QUERY_STRING'];?>" method="post">
                            <input type="hidden" name="action" value="update-role">
                            <div class="form-group">
                                <label for="role">Role name</label>
                                <input type="text" class="form-control" name="role" placeholder="Enter role name" value="<?php echo $_GET['role'];?>" />
                            </div>
                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require_once BASE_DIR . "footer.php"; ?>
<!-- FOOTER SECTION END-->