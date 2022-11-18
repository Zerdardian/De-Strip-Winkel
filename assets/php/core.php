<?php
    if(!empty($db)) {
        if(!empty($_POST)) {

        }

        // Building the webpage

        if(!empty($_GET['one'])) {

        } else {
            include_once "./assets/pages/require/header.php";
            include_once "./assets/pages/singlepages/index.php";
            include_once "./assets/pages/require/footer.php";
        }
    }
?>