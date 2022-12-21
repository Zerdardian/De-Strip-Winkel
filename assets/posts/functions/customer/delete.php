<?php
$target_dir = "./assets/images/comics/";
$seller = $db->query("SELECT * FROM seller WHERE `userid`=$userid")->fetch();
$sellerid = $seller['sellerid'];
$comicid = $subitem;
$comic = $db->query("SELECT * FROM `comic` WHERE `comicid`='$comicid' AND `sellerid`='$sellerid'")->fetch();
$owners = $db->query("SELECT * FROM `owned` WHERE `comicid`='$comicid'")->fetchAll();

$pic = $target_dir.$comic['comicpicture'];

if(!empty($seller)) {
    if($_POST['remove'] == 'true' || $_POST['remove'] == true) {
        foreach($owners as $owner) {
            $delete = $db->prepare("UPDATE `owned` SET `sellerid`=null, `comicid`=null WHERE `userid`=$userid AND `comicid`=$comicid")->execute();
            $delete->execute();
        }

        $delete = $db->prepare("DELETE FROM `comic` WHERE `sellerid`=$sellerid AND `comicid`=$comicid");
        $delete->execute();
        unlink($pic);

        header('location: /customer/home');
    }
}