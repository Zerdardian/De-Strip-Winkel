<?php
    $owned = $db->query("SELECT
         owned.sellerid, owned.comicid, owned.boughtdate as date, comic.comicname as name, comic.comicpicture as picture, seller.sellername
            FROM owned, comic, seller WHERE owned.userid=$userid AND seller.sellerid = owned.sellerid AND comic.comicid = owned.comicid")->fetchAll();
        ?>
<div id="strips" class="strips ownedstrips userstrips">
    <div class="owned">
        <?php
            foreach($owned as $strip) {
                ?>
                <div class="strip" data-comicid=<?=$strip['comicid']?> data-sellerid=<?=$strip['sellerid']?>>
                    <div class="picture">
                        <div class="image">
                            <img src="/assets/images/comics/<?=$strip['picture']?>" alt="<?=$strip['name']?>">
                        </div>
                    </div>
                    <div class="text">
                        <div class="comic">
                            <h2><?=$strip['name']?></h2>
                        </div>
                        <div class="name">
                            Created by: <?=$strip['name']?>
                        </div>
                    </div>
                    <button class="download">Download <?=$strip['name']?></button>
                </div>
                <?php
            }
        ?>
    </div>
</div>