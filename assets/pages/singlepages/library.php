<div class="myLibrary" id="myLibrary">
    <?php
    if (!empty($pageitem)) {
        $comic = $db->query("SELECT * FROM comic WHERE `comicid`=$pageitem")->fetch();
        if (!empty($comic)) {
            $ownedcheck = $db->query("SELECT * FROM owned WHERE `userid`=$userid AND `comicid`=$pageitem")->fetch();
            if (!empty($ownedcheck)) {
                $owned = true;
            } else {
                $owned = false;
            }
            if (!empty($subitem)) {
                if ($subitem == 'addtocart') {
                    $_SESSION['cart'][$pageitem]['id'] = $comic['comicid'];
                    $_SESSION['cart'][$pageitem]['name'] = $comic['comicname'];
                    header('location: /cart/');
                }
                if ($subitem == 'buynow') {
                    $userid = $_SESSION['user']['userid'];
                    $sellerid = $comic['sellerid'];
                    $comicid = $comic['comicid'];
                    $db->prepare("INSERT INTO owned (userid, sellerid, comicid) VALUES ($userid, $sellerid, $comicid)")->execute();
                    header('location: /library/');
                }
            }
    ?>
            <div class="item">
                <div class="comic">
                    <div class="image">
                        <img width="200px" src="/assets/images/comics/<?= $comic['comicpicture'] ?>" alt="comicpicture">
                    </div>
                    <div class="text">
                        <div class="title">
                            <?= $comic['comicname'] ?>
                        </div>
                        <div class="desc">
                            <?= $comic['comicdesc'] ?>
                        </div>
                    </div>
                    <div class="buyinfo">
                        <?php
                        if ($owned == true) {
                        ?>
                            <div class="alreadyowned">
                                You already own this comic!
                            </div>
                        <?php
                                } else {
                                    ?>
                        <div class="addtocart">
                            <a href="/library/<?= $pageitem ?>/addtocart/">
                                <button>Add to cart</button>
                            </a>
                        </div>
                        <div class="buynow">
                            <a href="/library/<?= $pageitem ?>/buynow/">
                                <button>Buy Now</button>
                            </a>
                        </div>
                    <?php
                                }
                    ?>

                    </div>
                </div>
            </div>
        <?php
        } else {
            header('location: /library/');
        }
    } else {
        $library = $db->query("SELECT * FROM comic")->fetchAll();

        ?>
        <table>
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Beschrijving</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($library as $comic) {
                ?>
                    <tr>
                        <td><?= $comic['comicname'] ?></td>
                        <td><?= $comic['comicdesc'] ?></td>
                        <td><img src="/assets/images/comics/<?= $comic['comicpicture'] ?>" alt="<?= $comic['comicname'] ?>" style="width:150px"></td>
                        <td><a href="/library/<?= $comic['comicid'] ?>/"><button>More info</button></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>

</div>