<?php
    $seller = $db->query("SELECT sellerid FROM `seller` WHERE `userid`='$userid'")->fetch();
    $sellerid = $seller['sellerid'];
    $comicid = $subitem;
    $comic = $db->query("SELECT * FROM `comic` WHERE `comicid`='$comicid' AND `sellerid`='$sellerid'")->fetch();
    $owners = $db->query("SELECT * FROM `owned` WHERE `comicid`='$comicid'")->fetchAll();

    $people = 0;

    foreach($owners as $owner) {
        $people++;
    }

    print_r($comic);
?>