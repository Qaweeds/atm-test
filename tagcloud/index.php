<?php
include_once "../_autoload.php";

//load models
include_once(BASE_DIR . 'tagcloud/models/tagcloud.model.php');

//create tagcloud here
$tagcloud = new tagcloud_model();

include_once BASE_DIR . "header.php" ;

//HEADER END
require_once BASE_DIR . "header-logo-bar.php";
//LOGO HEADER END
require_once BASE_DIR . "header-menu.php";
//MENU SECTION END

$data['tag_list'] = $tagcloud->get_tag_list();
$data['tag_cloud'] = $tagcloud->get_tag_cloud();

//load view
include(BASE_DIR . 'tagcloud/views/tagcloud.view.php');

//CONTENT-WRAPPER SECTION END
require_once BASE_DIR . "footer.php";
//FOOTER SECTION END
