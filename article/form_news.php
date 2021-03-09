<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 27.10.15
 * Time: 13:56
 */
//
include_once "../_autoload.php";
include_once BASE_DIR . "article/article.php";

$art = new Article();
if(isset($_POST['title']) && isset($_POST['description']) && !empty($_POST['title']) && !empty($_POST['description'])) {
    if ($art->postArticle($_POST['title'],$_POST['description'])){
        echo "Данные сохранены:    " . "<a href='index.php'>Список новостей</a>";
    }else{
        $open = fopen("Error/error_new_news.txt", "a+");
        fwrite($open, "Ошибка," .mysql_error(). "<br/>");
        fclose($open);
        echo "Ошибка! Попробуйте позже.";
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
                        Новая новость
                        <div class="pull-right">
                            <a class="btn btn-default" href="index.php">
                                <i class="fa fa-list"></i> Список новостей
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
<form method="post" action="">
    <b><p class="one">Заполните форму</p></b>
    <div class="form-group">
    <input type="text" name="title" required placeholder="Заголовок"><br><br>
    <textarea name="description" rows="5"  cols="35" required placeholder="Описание (250 символов)"></textarea><br>
        </div>
    <input type="submit" name="send" value="Добавить">
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php require_once BASE_DIR . "footer.php"; ?>
    <!-- FOOTER SECTION END-->
