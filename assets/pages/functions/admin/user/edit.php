<?php
    $pageid = $pagesubitem;
    $usertype[1] = "User";
    $usertype[2] = "Seller";
    $usertype[3] = "Admin";
    $user = $db->query("SELECT user.userid, user.email, user.created, user.lastlogin, userinfo.usertype, userinfo.firstname, userinfo.lastname FROM user, userinfo WHERE user.userid = $pageid AND userinfo.userid = $pageid")->fetch();
    if($userid == $user['userid']) {
        $selectbox = 'disabled';
    } else {
        $selectbox = '';
    }
    if(!empty($user)) {
        ?>
            <div class="form">
                <form action="/admin/users/edit/<?=$user['userid']?>/" method="post">
                    <input type="hidden" name="userid" value=<?=$user['userid']?>>
                    <input type="hidden" name="type" value="edit">
                    <label for="email">Email<?php
                        if($user['userid'] == $userid) {
                            ?> | You cannot edit your email here!<?php
                        }
                    ?></label>
                    <input type="text" name="email" id="email" value="<?=$user['email']?>" <?=$selectbox?>>
                    <label for="Usertype">Usertype<?php
                        if($user['userid'] == $userid) {
                            ?> | You cannot edit your own rank!<?php
                        }
                    ?></label>
                    <select name="usertype" id="usertype" <?=$selectbox?>>
                        <?php
                            foreach($usertype as $key=>$val) {
                                if($key == $user['usertype']) {
                                    $selected = "selected='true'";
                                } else {
                                    $selected = "";
                                }
                                ?>
                                <option value="<?=$key?>" <?=$selected?>><?=$val?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" value="<?=$user['firstname']?>">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" value="<?=$user['lastname']?>">
                    <input type="submit" value="Edit">
                </form>
            </div>
        <?php
    } else {
        ?>
            No User found. Please select a user on the user page.
        <?php
    }
?>