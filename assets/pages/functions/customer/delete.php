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
?>
<div class="areyousure deletecomic">
    <div class="image">
        <img src="/assets/images/comics/<?=$comic['comicpicture']?>" alt="">
    </div>
    <div class="removecomic">
        <h2>Are you sure?</h2>
        <p>Are you sure you want to remove <?=$comic['comicname']?>?<br>
        This action cannot be reversed as this will remove it for you and all <?=$people?> users.</p>
        <form action="/customer/delete/<?=$comicid?>/" method="post">
            <input type="hidden" name="remove" value=true>
            <input type="submit" value="Remove comic">
        </form>
    </div>
</div>