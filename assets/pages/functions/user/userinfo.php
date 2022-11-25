<div class="user userinfo" id="userinfo">
    <?php
    if(!empty($succes)) {
        ?>
        <div class="change succes" id="succes">
            <?php
                foreach($succes as $item) {
                    echo '<div class="item">';
                    echo $item;
                    echo '</div>';
                }            
            ?>
        </div>
        <?php
    }
    ?>

    <div class="change userinfo">
        <form action="/user/userinfo/?type=userinfo" method="post">
            <label for="firstname">Voornaam</label>
            <input type="text" name="firstname" id="firstname" placeholder="<?=$user['firstname']?>" value="<?=$user['firstname']?>">
            <label for="firstname">Achternaam</label>
            <input type="text" name="lastname" id="lastname" placeholder="<?=$user['lastname']?>" value="<?=$user['lastname']?>">
            <input type="submit" value="Bewerken">
        </form>
    </div>

    <div class="change password">
        <form action="/user/userinfo/?type=password" method="post">
            <label for="current">Je oude wachtwoord</label>
            <input type="password" name="current" id="current" placeholder="Current password">
            <label for="new">Je nieuwe wachtwoord</label>
            <input type="password" name="new" id="newpassword" placeholder="New password">
            <label for="repeat">Herhaal het wachtwoord</label>
            <input type="password" name="repeat" id="repeatpassword" placeholder="Repeat new password">
            <input type="submit" value="Bewerken">
        </form>
    </div>
</div>