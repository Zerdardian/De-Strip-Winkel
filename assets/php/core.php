<?php
    if(!empty($db)) {
        // Posts loaded if page is known to the system and will be set here based on function / page
        if(!empty($_POST)) {
            include_once "./assets/posts/settings.php";
        }

        // Building the webpage

        if(!empty($page)) {
            // Check if there is a function for this kind of page
            if(file_exists('./assets/pages/functions/'.$page.'.php')) {
                include_once "./assets/pages/require/header.php";
                include_once "./assets/pages/functions/$page.php";
                include_once "./assets/pages/require/footer.php"; 
            } else {
                // Check if there is a single page for this item
                if(file_exists("./assets/pages/singlepages/$page.php")) {
                    include_once "./assets/pages/require/header.php";
                    include_once "./assets/pages/singlepages/$page.php";
                    include_once "./assets/pages/require/footer.php"; 
                }
            }
        } else {
            // Singe page load for index. main page.
            include_once "./assets/pages/require/header.php";
            include_once "./assets/pages/singlepages/index.php";
            include_once "./assets/pages/require/footer.php";
        }
    } else {
      echo 'nodb';
    } 
?>