<?php
include_once "../_autoload.php";
include BASE_DIR . "role/Role.php";

$roleObj = new Role();
if (isset($_GET['del']) && !empty($_GET['del'])) {
    $id = $_GET['del'];
    $roleObj->deleteRole('role', $id);
}
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
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-default" href="user-role.php">
                    <i class="fa fa-list"></i>Manage user roles
                </a>
            </div>
            <div class="pull-right">
                <a class="btn btn-default" href="new-role.php">
                    <i class="fa fa-pencil"></i> New Role
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="wpr10 align-c">#</th>
                                <th class="align-c">
                                    <?php
                                    $orderby = "role";
                                    $orderas = "ASC";
                                    if (isset ($_GET['order_by']) && isset($_GET['order_as'])) {
                                        $orderby = $_GET['order_by'];
                                        $orderas = $_GET['order_as'];
                                        if ($orderas == 'ASC'){
                                            $orderas = 'DESC';
                                        }else{
                                            $orderas = "ASC";
                                        }
                                    }
                                    ?>
                                    <a href="index.php?order_by=<?php echo $orderby ?>&order_as=<?php echo $orderas ?>"><i class="fa fa-sort"></i></a>
                                    Role</th>
                                <th class="wpr30 align-c">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($roleObj->getRoles('role', [$orderby,$orderas]) as $index => $role) {
                                ?>
                                <tr>
                                    <td class="align-c"><?php echo ++$index ?></td>
                                    <td><?php echo $role['role'] ?></td>
                                    <td class="align-c">
                                        <a class="btn btn-primary mr10"
                                           href="edit-role.php?edit=<?php echo $role['id'] ?>&role=<?php echo $role['role'] ?>">
                                            <i class="fa fa-edit "></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger" href="index.php?del=<?php echo $role['id'] ?>">
                                            <i class="fa fa-pencil"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require_once BASE_DIR . "footer.php"; ?>
<!-- FOOTER SECTION END-->