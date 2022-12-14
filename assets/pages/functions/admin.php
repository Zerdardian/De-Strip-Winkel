<?php


if($loggedin) {
    /**
     * Pages
     * /admin/home/
     * /admin/change/comic/??/
     * /admin/change/user/??/
     * /admin/add/user/
     * 
     */
    $user = $db->query("SELECT * FROM `userinfo` WHERE `userid`='$userid' LIMIT 1")->fetch();   

    if($user['usertype'] == 1) {
        header('location: /user/');
    }

    if($user['usertype'] == 2) {
        header('location: /customer/');
    }

    if($user['usertype'] == 3) {
        if(empty($pageitem)) {
            header('location: /admin/home/');
        }

        if(!empty($pageitem)) {
            if(file_exists("./assets/pages/functions/admin/$pageitem.php")) {
                include_once "./assets/pages/functions/menus/adminmenu.php";
                include_once "./assets/pages/functions/admin/$pageitem.php";
            } else {
                echo 'no page found';
            }
        }
    }

} else {
    header('location: /login');
}