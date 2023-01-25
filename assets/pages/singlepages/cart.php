<?php
    if(!empty($_SESSION['cart'])) {
        if(!empty($pageitem)) {
            foreach($_SESSION['cart'] as $item) {
                $comicid = $item['id'];
                $comic = $db->query("SELECT * FROM comic WHERE `comicid`='$comicid'")->fetch();
                $userid = $_SESSION['user']['userid'];
                $sellerid = $comic['sellerid'];
                $check = $db->query("SELECT * FROM owned WHERE `userid`=$userid AND `comicid`=$comicid")->fetch();
                if(empty($check)) {
                    $db->prepare("INSERT INTO owned (userid, sellerid, comicid) VALUES ($userid, $sellerid, $comicid)")->execute();
                }
            }
            header('location: /library/');
        }
        ?>
            <div class="cart">
                <div class="items">
                    <?php
                        foreach($_SESSION['cart'] as $item) {
                            $id = $item['id'];
                            $cart = $db->query("SELECT * FROM comic WHERE `comicid`=$id")->fetch();
                            ?>
                            <div class="item">
                                <div class="image">
                                    <img src="/assets/images/comics/<?=$cart['comicpicture']?>" alt="" width=150px>
                                </div>
                                <div class="text">
                                    <?=$cart['comicname']?>
                                </div>
                                <div class="amount">
                                    <?=$cart['price']?>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <div class="buy">
                    <a href="/cart/finalize/">
                        <button>Buy now</button>
                    </a>
                </div>
            </div>
        
        <?php
    } else {
        ?>
            De winkelwagen is nu leeg.
        <?php
    }
?>