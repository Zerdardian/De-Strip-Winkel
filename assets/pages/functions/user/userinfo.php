<div class="user userinfo" id="userinfo">
    <div class="change userinfo">
        <form action="/user/userinfo/" method="post">
            <label for="firstname">Voornaam</label>
            <input type="text" name="firstname" id="firstname" placeholder="<?=$user['firstname']?>">
            <label for="firstname">Achternaam</label>
            <input type="text" name="lastname" id="lastname" placeholder="<?=$user['lastname']?>">
            <input type="submit" value="Bewerken">
        </form>
    </div>
</div>