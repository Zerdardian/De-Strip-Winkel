<?php
        $email = $_POST['loginemail'];
        $password = $_POST['loginpass'];

        $login = $db->query("SELECT * FROM `user` WHERE `email`='$email'")->fetch();

        if(!empty($login)) {
            if(password_verify($password, $login['password'])) {
                $_SESSION['user']['email'] = $login['email'];
                $_SESSION['user']['userid'] = $login['userid'];

                header('location: /');
            } else {
                $error = returnError('ILVUSR');
            }
        } else {
            $error = returnError('ILVUSR');
        }
?>