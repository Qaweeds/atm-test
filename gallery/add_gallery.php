<?php
include_once "../_autoload.php";
include_once BASE_DIR . "gallery/gallery.php";

$database = new DataBase();
$gal = new Gallery();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title']) && isset($_POST['description'])
        && !empty($_POST['title'])
        && !empty($_POST['description'])
    ) {
        $title = $database->escape($_POST['title']);
        $desc = $database->escape($_POST['description']);

        if ($gal->postGallery($title, $desc) == true) {
            header('Refresh: 5; url = ' . BASE_URL . 'gallery/index.php');
            echo '<div class="alert alert-success">';
                echo '<ul>';
                    echo '<li>Данные успешно добавлены!</li>';
                    echo '<li>Пожалуйста подождите, через 5 секунд вы будете перенаправлены на основной контент!</li>';
                echo '</ul>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger">';
                echo '<ul>';
                    echo '<li>Request failed!</li>';
                echo '</ul>';
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-danger">';
            echo '<ul>';
                echo '<li>Заполните все поля!</li>';
            echo '</ul>';
        echo '</div>';
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
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        New Gallery
                        <div class="pull-right">
                            <a class="btn btn-default" href="index.php">
                                <i class="fa fa-list"></i> Galleries list
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="add_gallery.php" method="post">
                            <div class="form-group">
                                <label>Title:<br>
                                    <input type="text" name="title">
                                </label><br>
                                <label>Description:<br>
                                    <textarea rows="10" cols="45"
                                              name="description"></textarea>
                                </label><br>
                            </div>
                            <label>
                                <input type="submit" value="Add Gallery">
                            </label>
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