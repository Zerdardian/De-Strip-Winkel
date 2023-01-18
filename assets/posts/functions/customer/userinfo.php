<?php
    print_r($_POST);
    $user = $db->query("SELECT 
    userinfo.firstname, userinfo.lastname, seller.sellername as name, seller.companyid, seller.adres, seller.housenumber as number, seller.postalcode, seller.country
        FROM userinfo, seller WHERE userinfo.userid=$userid AND seller.userid=$userid")->fetch();
    
    if($user['firstname'] != $_POST['firstname']) {
        $firstname = $_POST['firstname'];
        $db->prepare("UPDATE userinfo SET `firstname`='$firstname' WHERE userid=$userid")->execute();
    }
    if($user['lastname'] != $_POST['lastname']) {
        $lastname = $_POST['lastname'];
        $db->prepare("UPDATE userinfo SET `lastname`='$lastname' WHERE userid=$userid")->execute();
    }
    if($user['name'] != $_POST['companyname']) {
        $sellername = $_POST['sellername'];
        $db->prepare("UPDATE seller SET `sellername`='$sellername' WHERE userid=$userid")->execute();
    }
    if($user['companyid'] != $_POST['companyid']) {
        $companyid = $_POST['companyid'];
        $db->prepare("UPDATE seller SET `companyid`='$companyid' WHERE userid=$userid")->execute();
    }
    if($user['adres'] != $_POST['adres']) {
        $adres = $_POST['adres'];
        $db->prepare("UPDATE seller SET `adres`='$adres' WHERE userid=$userid")->execute();
    }
?>