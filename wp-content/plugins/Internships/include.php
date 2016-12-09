<?php
require_once __DIR__.'/src/vendor/RedBeanPHP4_3_3/rb.php';
require_once __DIR__.'/src/autoload.php';
require_once __DIR__.'/src/manualload.php';
require_once (__DIR__.'/vendor/fzaninotto/faker/src/autoload.php');
//require_once __DIR__.'/vendor/autoload.php'; //composer autoload

$database_name = DB_NAME.'_intern';

R::setup( sprintf('mysql:host=%s;dbname=%s', DB_HOST, $database_name), DB_USER, DB_PASSWORD );

//If connected
if (R::testConnection()) {
//    R::debug(true); //Un-comment this for see debugging
}
else {
    echo ("Can't connect database, Please check include.php for config. OR Create table for table's name");

    //try create DB
    global $wpdb;
    if ($wpdb->query("CREATE DATABASE {$database_name}")) {
        echo "Create database {$database_name} success!";
    }
    exit;
}
