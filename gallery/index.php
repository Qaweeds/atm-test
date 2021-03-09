<?php
include_once "../_autoload.php";
include BASE_DIR . "gallery/gallery.php";

$gal = new Gallery();
$get = $gal->getGalleries();

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $delete = $_GET['delete'];

    if ($gal->deleteGallery($delete) == true) {
        header('Location: ../gallery/index.php');
    } else {
        echo 'Request failed!';
    }
}
include_once BASE_DIR . "header.php";
?>
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
                <a class="btn btn-default" href="add_gallery.php">
                    <i class="fa fa-pencil"></i> New Gallery
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
                                <th class="align-c">Title</th>
                                <th class="align-c">Description</th>
                                <th class="align-c">Date</th>
                                <th class="wpr30 align-c">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($get as $val) { ?>
                                <tr>
                                    <td><?php echo $val['id'] ?></td>
                                    <td><?php echo $val['title'] ?></td>
                                    <td><?php echo substr($val['description'], 0, 20) ?></td>
                                    <td><?php echo $val['created_at'] ?></td>
                                    <td class="align-c">
                                        <a class="btn btn-primary mr10"
                                           href="update_gallery.php?update=<?php echo $val['id'] ?>">
                                            <i class="fa fa-edit "></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger" href="index.php?delete=<?php echo $val['id'] ?>">
                                            <i class="fa fa-pencil"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
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