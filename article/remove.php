<?php
//
include_once "../_autoload.php";
include_once BASE_DIR . "article/article.php";
if (isset($_GET['del'])){
    $id = $_GET['del'];
    $art = new Article();
    $art->deleteArticle($id);

}
header("Location: index.php");