<div class="infouser customer" id="customerinfo">
    <div class="userinfo">
        <div class="title">
            <span>Welkom</span>
        </div>
    </div>
    <div class="comics">
        <?php
            $comics = $db->query("SELECT * FROM comic WHERE `sellerid`='".$seller['sellerid']."'")->fetchall();
            foreach($comics as $comic) {
                $count = $db->query("SELECT COUNT(*) FROM owned AS OWNEDUSERS WHERE `comicid`=".$comic['comicid'])->fetch();
                print_r($count);
                ?>
                    <div class="comic" data-comicid="<?=$comic['comicid']?>">
                        <div class="image">
                            <img src="/assets/images/comics/<?=$comic['comicpicture']?>" alt="Comic picture <?=$comic['comicname']?>">
                        </div>
                        <div class="comicinfo">
                            <div class="name">
                                <?=$comic['comicname']?> | Owned by <?=$count[0]?>
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="/customer/change/<?=$comic['comicid']?>">
                                <button>Change</button>
                            </a>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</div>