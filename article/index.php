<?php
include_once "../_autoload.php";
include_once BASE_DIR . "article/article.php";

$art = new Article();
$art->getArticles();
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
                <a class="btn btn-default" href="form_news.php">
                    <i class="fa fa-pencil"></i> Добавить новость
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
                                <th class="align-c">Created Add</th>
                                <th class="wpr30 align-c">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($art->getArticles() as $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value['id'] ?></td>
                                    <td><?php echo $value['title'] ?></td>
                                    <td><?php echo $value['description'] ?></td>
                                    <td><?php echo $value['created_at'] ?></td>
                                    <td class="align-c">
                                        <a class="btn btn-primary mr10" href="edit.php?id=<?php echo $value['id'] ?>">
                                            <i class="fa fa-edit "></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger" href="remove.php?del=<?php echo $value['id'] ?>">
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
