<?php
    // Env data
    use Dotenv\Dotenv;

$base = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
$dotenv = Dotenv::createImmutable($base);
$dotenv->load();

// Everything related to getting pages
if (isset($_GET['one']) && $_GET['one'] != '.php') {
    $item = str_replace('.php', '', $_GET['one']);
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" . $item . '/';
    $fullurl = '/' . $item . '/';
}

if (isset($_GET['two']) && $_GET['two'] != '.php') {
    $item = str_replace('.php', '', $_GET['two']);
    $actual_link .= $item . '/';
    $fullurl .= $item . '/';
}

if (isset($_GET['three']) && $_GET['three'] != '.php') {
    $item = str_replace('.php', '', $_GET['three']);

    $actual_link .= $_GET['three'] . '/';
    $fullurl .= $_GET['three'] . '/';
}

if (isset($_GET['four']) && $_GET['four'] != '.php') {
    $item = str_replace('.php', '', $_GET['one']);

    $actual_link .= $item . '/';
    $fullurl .= $item . '/';
}

// Database
try {
    $conn = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

// To be crafted.