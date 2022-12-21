<?php
$target_dir = "./assets/images/comics/";
$seller = $db->query("SELECT * FROM seller WHERE `userid`=$userid")->fetch();
$sellerid = $seller['sellerid'];
$comicid = $subitem;
$comic = $db->query("SELECT * FROM `comic` WHERE `comicid`='$comicid' AND `sellerid`='$sellerid'")->fetch();
$prevpic = $target_dir.$comic['comicpicture'];

$price = $comic['price'];
$description = $_POST['description'];
$newprice = $_POST['fullnumber'].".".$_POST['decimal'];
$name = $_POST['name'];

if(!empty($seller)) {
    if(!empty($_FILES['caft'])) {
        $filename = date("his")."_".basename($_FILES['caft']['name']);

        $uploadfile = $target_dir.$filename;
        if(move_uploaded_file($_FILES['caft']['tmp_name'], $uploadfile)) {
            unlink($prevpic);
            $update = $db->prepare("UPDATE comic SET `comicpicture`=:picture WHERE `comicid`=$comicid and `sellerid`=$sellerid");
            $update->bindparam(':picture', $filename);

            $update->execute();
        }
    }

    if($name != $comic['comicname']) {
        $update = $db->prepare("UPDATE comic SET `comicname`=:name WHERE `comicid`=$comicid AND `sellerid`=$sellerid");
        $update->bindparam(':name', $name);

        $update->execute();
    }

    if($description != $comic['comicdesc']) {
        $update = $db->prepare("UPDATE comic SET `comicdesc`=:description WHERE `comicid`=$comicid AND `sellerid`=$sellerid");
        $update->bindparam(':description', $description);

        $update->execute();
    }

    if($price != $newprice) {
        $update = $db->prepare("UPDATE comic SET `price`=:price WHERE `comicid`=$comicid AND `sellerid`=$sellerid");
        $update->bindparam(':price', $newprice);

        $update->execute();
    }

    // header('location: /customer/home/');
}
?>