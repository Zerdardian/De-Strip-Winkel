test page
<?php
    if(!empty($_SESSION['user'])) {?>
        <a href="/user/">user</a>
        <a href="/logout/">logout</a>
    <?php
    } else {
        ?>
        <a href="/login/">Login</a>
        <a href="/register/">Login</a>
        <?php
    }
?>
