<?php
    if($loggedin) {
        $user = $db->query("SELECT * FROM `userinfo` WHERE `userid`='$userid' LIMIT 1")->fetch();

        if($user['usertype'] == 1) {
            if(empty($pageitem)) {
                header('location: /user/profile/');
            }

            if(!empty($pageitem)) {
                if(file_exists("./assets/pages/functions/user/$pageitem.php")) {
                    include_once "./assets/pages/functions/menus/usermenu.php";
                    include_once "./assets/pages/functions/user/$pageitem.php";
                } else {
                    echo 'no page found';
                }
            }
        }

        if($user['usertype'] == 2) {
            header('location: /customer/');
        }

        if($user['usertype'] == 3) {
            header('location: /admin/');
        }
    } else {
        header('location: /login');
    }