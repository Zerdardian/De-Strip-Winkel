<div class="login" id="login">
    <div class="pagetitle"></div>
    <div class="formlogin" id="formlogin">
        <form action="/login/" method="post">
            <?php
                if(!empty($error)) {
                    ?>
                        <div class="error" data-errorcode='<?=$error['errorcode']?>'>
                            <?=$error['message']?>                            
                        </div>
                    <?php
                }
            ?>
            <h2 class="blocktitle">Welkom terug</h2>
            <div class="emaillogin">
                <label for="loginemail">E-mail</label>
                <input type="email" name="loginemail" id="loginemail" placeholder="Voer een email in...">
            </div>
            <div class="passlogin">
                <label for="loginpass">Wachtwoord</label>
                <input type="password" name="loginpass" id="loginpass" placeholder="Voer een wachtwoord in...">
            </div>
            <div class="submitlogin">
                <input type="submit" name="loginsubmit" id="loginsubmit" value="Inloggen">
            </div>
            <a href="/register">
                <div class="linkregister">
                    Nog geen account? Registreer je dan hier!
                </div>
            </a>
            <a href="">
                <div class="resetpass">
                    Wachtwoord vergeten?
                </div>
            </a>
        </form>
    </div>
    
    <div class="pagetitle"></div>
</div>
