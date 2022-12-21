<div class="register" id="register">
    <div class="pagetitle"></div>
    <div class="formregister" id="formregister">
        <form action="/register/" method="post">
            <div class="registerfname">
                <label for="namefregister">Voornaam</label>
                <input type="text" name="namefregister" id="namefregister" placeholder="Voer je voornaam in...">
            </div>
            <div class="registerlname">
                <label for="namelregister">Achternaam</label>
                <input type="text" name="namelregister" id="namelregister" placeholder="Voer je naam in...">
            </div>
            <div class="registeremail">
                <label for="emailregister">Email</label>
                <input type="email" name="emailregister" id="emailregister" placeholder="Voer een email in...">
            </div>
            <div class="registerpass">
                <label for="passregister">Wachtwoord</label>
                <input type="password" name="passregister" id="passregister" placeholder="Voer een wachtwoord in...">
            </div>
            <div class="registerrepass">
                <label for="repassregister">Wachtwoord herhaling</label>
                <input type="password" name="repassregister" id="repassregister" placeholder="Voer opnieuw je wachtwoord in...">
            </div>
            <div class="registersubmit">
                <input type="submit" id="submitregister" value="Registreren">
            </div>
            <a href="/login/">
                <div class="linklogin">
                    Al een account? Log dan in.
                </div>
            </a>
        </form>
    </div>
    <div class="pagetitle"></div>
</div>