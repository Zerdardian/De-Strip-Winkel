<?php
    if(!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

    header('location: /login.php')
?>