<?php
include_once "../_autoload.php";
include BASE_DIR . 'user/funcs.php';
session_start();
if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
    $id = $_SESSION['user']['id'];
    $name = $_SESSION['user']['firstname'];
    $last_name = $_SESSION['user']['lastname'];
    $email = $_SESSION['user']['email'];
    $phone = $_SESSION['user']['phone'];
} else {
    die('Что-то пошло не так. :(');
}

$user = new User();
if (!empty($_POST['f_name']) and !empty($_POST['l_name']) and !empty($_POST['email'])) {
    $firs_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $email = $_POST['email'];
    $pass = (!empty($_POST['pass']) ? $_POST['pass'] : $_SESSION['user']['password']);
    $phone = (!empty($_POST['phone'])) ? $_POST['phone'] : " ";

    $user->setUser($firs_name, $last_name, $email, $pass, $phone);
    $res = $user->putUser($id);
    if ($res) {
        session_destroy();
        header("Location: " .  BASE_URL . "user/");
    }
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
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit User
                        <div class="pull-right">
                            <a class="btn btn-default" href="<?php echo BASE_URL ?>user/">
                                <i class="fa fa-list"></i> Users list
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form name="add_form" action="<?php echo BASE_URL?>user/red_user.php" method="post">
                            <div class="form-group">
                                <label for="role">First name</label>
                                <input type="text" class="form-control" name="f_name" placeholder="Enter first name"
                                       value="<?php echo $name ?>" />
                            </div>
                            <div class="form-group">
                                <label for="role">Last name</label>
                                <input type="text" class="form-control" name="l_name" placeholder="Enter last name"
                                       value="<?php echo $last_name ?>" />
                            </div>
                            <div class="form-group">
                                <label for="role">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email"
                                       value="<?php echo $email ?>" />
                            </div>
                            <div class="form-group">
                                <label for="role">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter email"
                                       value="<?php echo $phone ?>" />
                            </div>
                            <div class="form-group">
                                <label for="role">Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Enter password" />
                            </div>

                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($res)) {
    echo ($res == 1) ? " " : 'Обновление данных не удалось';
}
?>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require_once BASE_DIR . "footer.php"; ?>
<!-- FOOTER SECTION END-->
