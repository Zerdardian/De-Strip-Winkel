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

$price = explode('.', $comic['price']);

?>
<div class="form">
        <form enctype="multipart/form-data" action="/customer/change/<?=$comicid?>/" method="post">
            <label for="name">Comic name</label>
            <input type="text" name="name" id="name" placeholder="Comic name" value="<?=$comic['comicname']?>">
            <label for="description">Comic Description</label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Uitleg over comic"><?=$comic['comicdesc']?></textarea>
            <label for="caft">Voorkant comic</label>
            <img src="/assets/images/comics/<?=$comic['comicpicture']?>" alt="Current picture">
            <input   type="file" name="caft" id="caft" accept="image/png">
            <input type="number" name="fullnumber" id="fullnumber" value="<?=$price[0]?>">.<input type="number" name="decimal" id="decimal" min="0" max="99" value="<?=$price[1]?>">
            <input type="submit" value="Edit this comic">
        </form>
    </div>