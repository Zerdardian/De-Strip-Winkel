<?php
    switch($_POST['type']) {
        case 'edit':
            print_r($_POST);
            $userid = $email = $usertype = $fisrtname = $lastname = "";
            $userid = $_POST['userid'];
            $email = $_POST['email'];
            $usertype = $_POST['usertype'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];

            $user = $db->query("SELECT user.email, userinfo.usertype, userinfo.firstname, userinfo.lastname FROM user, userinfo WHERE user.userid=$userid AND userinfo.userid=$userid")->fetch();

            if(!empty($email) && $user['email'] != $email) {
                $update = $db->prepare("UPDATE user SET `email`='$email' WHERE `userid`=$userid")->execute();
            }

            if(!empty($usertype) && $user['usertype'] != $usertype) {
                $update = $db->prepare("UPDATE userinfo SET `usertype`=$usertype WHERE `userid`=$userid")->execute();
            }

            if(!empty($firstname) && $user['firstname'] != $firstname) {
                $update = $db->prepare("UPDATE userinfo SET `firstname`='$firstname' WHERE `userid`=$userid")->execute();
            }

            if(!empty($lastname) && $user['lastname'] != $lastname) {
                $update = $db->prepare("UPDATE userinfo SET `lastname`='$lastname' WHERE `userid`=$userid")->execute();
            }

            header('location: /admin/users/');
            break;
        default:
            break;
    }
    print_r($_POST);
?>