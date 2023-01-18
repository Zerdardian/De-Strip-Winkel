<?php
    $country[] = "Netherlands";
    $user = $db->query("SELECT 
        userinfo.firstname, userinfo.lastname, seller.sellername as name, seller.companyid, seller.adres, seller.housenumber as number, seller.postalcode, seller.country
            FROM userinfo, seller WHERE userinfo.userid=$userid AND seller.userid=$userid")->fetch();
?>

<div class="userinfo">
    <div class="info">
        <form action="/customer/userinfo/" method="post">
            <input type="text" name="firstname" id="firstname" value="<?=$user['firstname']?>">
            <input type="text" name="lastname" id="lastname" value="<?=$user['lastname']?>">
            <input type="text" name="companyname" id="companyname" value="<?=$user['name']?>">
            <input type="text" name="companyid" id="companyid" value="<?=$user['companyid']?>">
            <input type="text" name="adres" id="adres" value="<?=$user['adres']?>">
            <input type="number" name="postalcode" id="postalcode" value="<?=$user['postalcode']?>">
            <select name="country" id="country">
                <option value="NULL">Select an option</option>
                <?php
                    foreach($country as $option) {
                        if($user['country'] == $option) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }
                        ?>
                        <option value="<?=$option?>" <?=$selected?>><?=$option?></option>
                        <?php
                    }
                ?>
            </select>
            <input type="submit" value="Bewerken">
        </form>
    </div>
</div>