<?php
    $seller = $db->query("SELECT sellerid FROM `seller` WHERE `userid`='$userid'")->fetch();
    $sellerid = $seller['sellerid'];
    $comics = $db->query("SELECT * FROM `comic` WHERE `sellerid`='$sellerid'")->fetchAll();
?>

<div class="comics all comsumer">
    <div class="allcomics">
        <?php
            foreach($comics as $comic) {
                ?>
                <div class="comic" data-comicid="<?=$comic['comicid']?>">
                    <div class="image">
                        <img src="/assets/images/comics/<?=$comic['comicpicture']?>" alt="Comic <?=$comic['comicname']?>">
                    </div>
                    <div class="info"></div>
                    <div class="edit">
                        <a href="/customer/change/<?=$comic['comicid']?>/">
                            Pas <?=$comic['comicname']?> aan
                        </a>
                        <a href="/customer/delete/<?=$comic['comicid']?>/">
                            Verwijder <?=$comic['comicname']?>
                        </a>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>