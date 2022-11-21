<?php
    $fname = $lname = $email = $password = $repassword = "";
    if(!empty($_POST['namefregister'])) {
        $fname = $_POST['namefregister'];
    }

    if(!empty($_POST['namelregister'])) {
        $lname = $_POST['namelregister'];
    }

    if(!empty($_POST['emailregister'])) {
        $email = $_POST['emailregister'];
    }

    if(!empty($_POST['passregister'])) {
        $password = $_POST['passregister'];
    }

    if(!empty($_POST['repassregister'])) {
        $repassword = $_POST['repassregister'];
    }

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($repassword)) {
        $check = $db->query("SELECT * FROM `user` WHERE `email`='$email' LIMIT 1")->fetch();

        if(empty($check)) {
            if($password == $repassword) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $insert = $db->prepare("INSERT INTO `user` (`email`, `password`) VALUES (:email, :password)");
                $insert->bindParam(':email', $email);
                $insert->bindParam(':password', $hash);

                $insert->execute();

                $select = $db->query("SELECT userid FROM `user` WHERE `email`='$email'")->fetch();
                $id = $select['userid'];

                $insert = $db->prepare("INSERT INTO `userinfo` (`userid`, `firstname`, `lastname`) VALUES (:userid, :firstname, :lastname)");
                $insert->bindParam(':userid', $id);
                $insert->bindParam(':firstname', $fname);
                $insert->bindParam(':lastname', $lname);
                if($insert->execute()) {
                    header('location: /login/');
                }
            } else {
                $error = returnError('PASSNTSAME');
            }
        } else {
            $error = returnError('USRNKOWN');
        }
    } else {
        $error = returnError('IVLDDTA');
    }

    print_r($_POST);
?>