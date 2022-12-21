<?php
// $subitem = user;
// $pagesubitem = page item for user;
// example: ...min/users/{userid}/{pagetype}/
// so: /admin/users/1/edit/
//     /admin/users/1/disable/
//     /admin/users/1/delete/
if(empty($subitem)) {
    $subitem = "";
}

switch ($subitem) {
    case 'edit':
        include_once "./assets/pages/functions/admin/user/edit.php";
        break;
    case 'disable':
        echo 'Disable a user. not yet tho.';
        break;
    case 'delete':
        echo 'Delete a user, not yet tho';
        break;
    default:
        $users = $db->query("SELECT user.userid, user.email, user.created, user.lastlogin, userinfo.usertype, userinfo.firstname, userinfo.lastname FROM user, userinfo WHERE user.userid = userinfo.userid")->fetchAll();
        ?>
        <div class="users">
            <?php
            foreach ($users as $user) {
            ?>
                <div class="user">
                    <div class="info">
                        <a href="/admin/users/edit/<?= $user['userid'] ?>/">
                            <div class="email">
                                <?= $user['email'] ?>
                            </div>
                        </a>
                        <div class="name">
                            <?= $user['firstname'] ?> <?= $user['lastname'] ?>
                        </div>
                        <div class="created">
                            Created <?= date("d/m/y", strtotime($user['created'])) ?>
                        </div>
                        <div class="lastlogin">
                            Last login <?= date("d/m/y", strtotime($user['lastlogin'])) ?>
                        </div>
                        <div class="buttons">
                            <a href="/admin/users/edit/<?= $user['userid'] ?>/">
                                <button>
                                    Edit User
                                </button>
                            </a>
                            <a href="/admin/users/disable/<?= $user['userid'] ?>/">
                                <button>
                                    Disable User
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <?php
        break;
}
?>