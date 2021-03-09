<?php
include_once "../_autoload.php";
include BASE_DIR . "gallery/gallery.php";

$gal = new Gallery();
$database = new DataBase();
$res = array();

if (isset($_GET['update']) && !empty($_GET['update'])) {
    $update = $_GET['update'];

   $res = $gal->getGallery($update);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['title']) or empty($_POST['description'])) {
            echo '<div class="alert alert-danger">';
                echo '<ul>';
                    echo '<li>Заполните все поля!</li>';
                echo '</ul>';
            echo '</div>';
        } else {
            $title = $database->escape($_POST['title']);
            $desc = $database->escape($_POST['description']);

            if ($gal->putGallery($title, $desc, $update) == true) {
                header('Refresh: 5; url=../gallery/index.php');
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
        }
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
                        Edit Gallery
                        <div class="pull-right">
                            <a class="btn btn-default" href="index.php">
                                <i class="fa fa-list"></i> Galleries list
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
<?php foreach ($res as $val) { ?>
<form action="" method="post">
    <div class="form-group">
    <label>Title:<br>
        <input type="text" name="title" value="<?php echo $val[0]; ?>">
    </label><br>
    <label>Description:<br>
        <textarea rows="10" cols="45" name="description"><?php echo $val[1]; } ?></textarea>
    </label><br>
    </div>
    <label>
        <input type="submit" value="Update Gallery">
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