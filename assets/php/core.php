<?php
    if(!empty($db)) {
        // Posts loaded if page is known to the system and will be set here based on function / page
        // Add functions with they required items through /posts/(they own map.)
        // Example: /posts/user/basis.php or /posts/user/userinfo.php
        if(!empty($_POST)) {
            include_once "./assets/posts/settings.php";
        }

        // Building the webpage

        // Creation of new pages or functions for the webpage.
        // Please add them in /pages/functions/ or /pages/singepages/
        // For single pages, they will be loaded instantly while Functions require they own items to be created through there.

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