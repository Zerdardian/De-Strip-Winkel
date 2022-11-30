<?php
    // If the page isn't empty
    if(!empty($page)) {
        // Check if the functions is there of the page otherwise.
        if(file_exists('./assets/pages/functions/'.$page.'.php')) {
            // Check if there is a page item.
            if(!empty($pageitem)) {
                // Check if the function is known
                if(file_exists('./assets/posts/functions/'.$page.'/'.$pageitem.'.php')) {
                    include_once "./assets/pages/require/header.php";
                    include_once './assets/posts/functions/'.$page.'/'.$pageitem.'.php';
                    include_once "./assets/pages/require/footer.php";
                }
            } else {
                // Check if there is a basis post functions for that function
                if(file_exists('./assets/posts/functions/'.$page.'/basis.php')) {
                    include_once "./assets/pages/require/header.php";
                    include_once './assets/posts/functions/'.$page.'/basis.php';
                    include_once "./assets/pages/require/footer.php";
                }
            }
        } else {
            // Check for single page POST requests.
            if(file_exists("./assets/posts/single/$page.php")) {
                include_once "./assets/pages/require/header.php";
                include_once "./assets/posts/single/$page.php";
                include_once "./assets/pages/require/footer.php";
            }
        }
    }