<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 30.10.2015
 * Time: 23:17
 */
?>
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li>
                            <a <?php if (Breadcrumb::isActiveMenu() ) { ?> class="menu-top-active" <?php } ?>
                                href="<?php echo BASE_URL ?>">Dashboard
                            </a>
                        </li>
                        <li>
                            <a <?php if (Breadcrumb::isActiveMenu('role') ) { ?> class="menu-top-active" <?php } ?>
                                href="<?php echo BASE_URL ?>role/">Roles</a>
                        </li>
                        <li>
                            <a <?php if (Breadcrumb::isActiveMenu('user') ) { ?> class="menu-top-active" <?php } ?>
                                href="<?php echo BASE_URL ?>user/">Users</a>
                        </li>
                        <li>
                            <a <?php if (Breadcrumb::isActiveMenu('gallery') ) { ?> class="menu-top-active" <?php } ?>
                                href="<?php echo BASE_URL ?>gallery/">Gallery</a>
                        </li>
                        <li>
                            <a <?php if (Breadcrumb::isActiveMenu('article') ) { ?> class="menu-top-active" <?php } ?>
                                href="<?php echo BASE_URL ?>article/">News</a>
                        </li>
                        <li>
                            <a <?php if (Breadcrumb::isActiveMenu('onlinetest') ) { ?> class="menu-top-active" <?php
                            } ?>
                                href="<?php echo BASE_URL ?>onlinetest/startTest/index.php">OnlineTest</a>
                        </li>
                        <li>
                            <a <?php if (Breadcrumb::isActiveMenu('tagcloud') ) { ?> class="menu-top-active" <?php } ?>
                                href="<?php echo BASE_URL ?>tagcloud/">TagCloud</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
