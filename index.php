<?php
session_start();
ini_set('display_errors', 1);


$uri = parse_url($_SERVER['REQUEST_URI']);
$admin_uri = explode("/", $uri["path"]);

if ($admin_uri == "admin") {
    $_SESSION['admin'] = true;
    require_once 'admin/application/bootstrap.php';
}else{
    require_once 'application/bootstrap.php';
}