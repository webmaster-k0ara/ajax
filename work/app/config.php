<?php

session_start();

define('DSN', 'mysql:host=db;dbname=myapp;charset=utf8mb4');
define('DB_USER', 'myappuser');
define('DB_PASS', 'myapppass');
define('SITEURL', 'http://' . $_SERVER['HTTP_HOST']);

// require_once(__DIR__ . '/Utils.php');
// require_once(__DIR__ . '/Token.php');
// require_once(__DIR__ . '/Database.php');
// require_once(__DIR__ . '/Todo.php');

spl_autoload_register(function($class) {

  $prefix = 'MyApp\\';

  if(strpos($class,$prefix) === 0) {
    $fileName = sprintf(__DIR__ . '/%s.php', substr($class,strlen($prefix)));
    if (file_exists($fileName)) {
      require($fileName);
    } else {
      echo 'file not found: ' . $fileName;
      exit;
    }
  }



});
