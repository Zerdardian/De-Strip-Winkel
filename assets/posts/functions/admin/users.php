<?php
    switch($_POST['type']) {
        case 'edit':
            $userid = $_POST['userid'];
            $email = $_POST['email'];
            $usertype = $_POST['usertype'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];

            // $user = $db->query("SELECT * FROM userid")
            break;
        default:
            break;
    }
    print_r($_POST);
?>