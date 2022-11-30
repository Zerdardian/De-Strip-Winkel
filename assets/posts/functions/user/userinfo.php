<?php
    $type = $_GET['type'];

    if(empty($type)) return;

    if(!empty($userid) && !empty($email)) {
        switch($type) {
            case 'userinfo':
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
    
                $user = $db->query("SELECT * FROM `userinfo` WHERE `userid`=$userid LIMIT 1")->fetch();
    
                if(empty($user)) {
                    header('location: /logout');
                    return;
                } else {
                    if($firstname != $user['firstname']) {
                        $change = $db->prepare("UPDATE `userinfo` SET `firstname`=:firstname WHERE `userid`=$userid");
                        $change->bindParam(':firstname', $firstname);
                        if($change->execute()) {
                            $succes[] = "Firstname Succesfully changed";
                        }
                    }
    
                    if($lastname != $user['lastname']) {
                        $change = $db->prepare("UPDATE `userinfo` SET `lastname`=:lastname WHERE `userid`=$userid");
                        $change->bindParam(':lastname', $lastname);
                        if($change->execute()) {
                            $succes[] = "Lastname Succesfully changed";
                        }
                    }
                }
                break;
            case 'password':
                $current = $_POST['current'];
                $new = $_POST['new'];
                $repeat = $_POST['repeat'];

                if(!empty($current) || !empty($new) || !empty($repeat)) {
                    $user = $db->query("SELECT * FROM `user` WHERE `userid`=$userid LIMIT 1")->fetch();
                    if(password_verify($current, $user['password'])) {
                        if($current != $new) {
                            if($new == $repeat) {
                                $password = password_hash($new, PASSWORD_DEFAULT);

                                $change = $db->prepare("UPDATE `user` SET `password`=:password WHERE `userid`=$userid");
                                $change->bindParam(':password', $password);

                                if($change->execute()) {
                                    $succes[] = "Password changed succesfully";
                                }
                            }  else {
                                $error[] = "Please fill in the same password in the field before continuing.";
                            }
                        } else {
                            $error[] = "Password can't be the same as the previous one!";
                        }
                    } else {
                        $error[] = "Wrong password, please try again!";
                    }
                } else {
                    $error[] = 'Please fill in all fields';
                }

                break;
            default:
                break;
        }
    }
?>