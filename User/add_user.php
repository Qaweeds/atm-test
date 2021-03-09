<?php
include_once "../_autoload.php";

include BASE_DIR . 'user/funcs.php';

$user = new User();
if (!empty($_POST['f_name']) and !empty($_POST['l_name']) and
    !empty($_POST['email']) and !empty($_POST['pass'])
) {
    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = (!empty($_POST['phone'])) ? $_POST['phone'] : " ";

    $user->setUser($first_name, $last_name, $email, $pass, $phone);
    $res = $user->postUser();
    if ($res) {
        header("refresh:5;url = " . BASE_URL . 'user/index.php');
    ?>
        <div class="alert alert-success">
            <ul>
            <li>User has been added successfully.<br>Redirect in 5 sec.</li>
            </ul>
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-success">
            <ul>
                <li>User has not been added. Email is occupied</li>
            </ul>
        </div>
<?php
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
                        Add User
                        <div class="pull-right">
                            <a class="btn btn-default" href="<?php echo BASE_URL ?>user/">
                                <i class="fa fa-list"></i> Users list
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form name="add_form" action="<?php echo BASE_URL?>user/add_user.php" method="post">
                            <div class="form-group">
                                <label for="role">First name</label>
                                <input type="text" class="form-control" name="f_name" placeholder="Enter first name" />
                            </div>
                            <div class="form-group">
                                <label for="role">Last name</label>
                                <input type="text" class="form-control" name="l_name" placeholder="Enter last name" />
                            </div>
                            <div class="form-group">
                                <label for="role">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email" />
                            </div>
                            <div class="form-group">
                                <label for="role">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter email" />
                            </div>
                            <div class="form-group">
                                <label for="role">Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Enter password" />
                            </div>

                            <button type="submit" class="btn btn-default">Add user</button>
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
