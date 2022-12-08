<?php
    if($loggedin) {
        // Urls

        // /customer/home/
        // /customer/new/
        // /customer/all/
        // /customer/change/{comicid}/
        // /customer/see/{comicid}/
        // /customer/delete/{comicid}/
        // /customer/userinfo/

        $user = $db->query("SELECT * FROM `userinfo` WHERE `userid`='$userid' LIMIT 1")->fetch();

        if($user['usertype'] == 2) {
            if(empty($pageitem)) {
                header('location: /customer/home/');
            }

            if(!empty($pageitem)) {
                if(file_exists("./assets/pages/functions/customer/$pageitem.php")) {
                    include_once "./assets/pages/functions/menus/customermenu.php";
                    include_once "./assets/pages/functions/customer/$pageitem.php";
                } else {
                    echo 'no page found';
                }
            }
        }
    }
?>