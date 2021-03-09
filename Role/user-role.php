<?php
include_once "../_autoload.php";
include BASE_DIR . "role/Role.php";
include BASE_DIR . "user/funcs.php";
$roleObj = new Role();
$userObj = new User();
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
            <div class="col-md-7">
                <form action="" method="post">
                    <label>User</label>
                    <select name="user" size="1"><br>
                        <?php
                        foreach ($userObj->getUsers() as $index => $user) {
                            ?>
                            <option
                                value="<?php echo $user['firstname'] . " " . $user['lastname'] ?>">
                                <?php echo $user['firstname'] . " " . $user['lastname'] ?>
                            </option>
                            <br>
                        <?php
                        }
                        ?>
                    </select>
                    <label>Role</label>
                    <select name="role[]" size="3" multiple><br>
                        <?php
                        foreach ($roleObj->getRoles('role') as $index => $role) {
                            ?>
                            <option value="<?php echo $role['role'] ?>"><?php echo $role['role'] ?></option>
                            <br>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="submit" value="Save">
                </form>
                <?php
                if (isset($_POST['role']) && isset($_POST['user'])) {
                    foreach ($userObj->getUsers() as $u) {
                        if ($u['firstname']." ".$u['lastname'] == $_POST['user']) {
                            foreach ($roleObj->getRoles('role') as $r) {
                                if (array ($r[1]) == $_POST['role']) {
                                    echo '<div class="alert alert-success">' .$roleObj->setUsersByRole($u['id'],$r[0]). '</div>';
                                }
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require_once BASE_DIR . "footer.php"; ?>
<!-- FOOTER SECTION END-->
