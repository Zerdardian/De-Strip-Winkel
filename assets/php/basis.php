<?php
    // Env data
    use Dotenv\Dotenv;

    $base = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
    // Dotenv is used for loading basis info for the page that doesn't have the be shown to the users outside of this website.
    // So please, don't leak <3

    $dotenv = Dotenv::createImmutable($base);
    $dotenv->load();

    // Everything related to getting pages

    // Page general or function
    if (isset($_GET['one']) && $_GET['one'] != '.php') {
        $item = str_replace('.php', '', $_GET['one']);

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" . $item . '/';
        $fullurl = '/' . $item . '/';
    }

    // Function on that page
    if (isset($_GET['two']) && $_GET['two'] != '.php') {
        $item = str_replace('.php', '', $_GET['two']);
        $pageitem = str_replace('.php', '', $_GET['two']);

        $actual_link .= $item . '/';
        $fullurl .= $item . '/';
    }

    // Further functions
    if (isset($_GET['three']) && $_GET['three'] != '.php') {
        $item = str_replace('.php', '', $_GET['three']);
        $subitem = str_replace('.php', '', $_GET['three']);

        $actual_link .= $_GET['three'] . '/';
        $fullurl .= $_GET['three'] . '/';
    }

    if (isset($_GET['four']) && $_GET['four'] != '.php') {
        $item = str_replace('.php', '', $_GET['four']);
        $pagesubitem = str_replace('.php', '', $_GET['four']);

        $actual_link .= $item . '/';
        $fullurl .= $item . '/';
    }

    // Database
    try {
        $db = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $dberr['code'] = 404;
        $dberr['type'] = "UNKWN_USR";
        $dberr['msg'] = $e->getMessage();
    }

    // Page data
    $url = "$_SERVER[REQUEST_URI]";
    if (!empty($_GET['one'])) {
        $page = str_replace('.php', '', $_GET['one']);
    } else {
        $page = 'index';
    }

// User data

    if(!empty($_SESSION['user'])) {
        $userid = $_SESSION['userid'];
        $email = $_SESSION['email'];
    }