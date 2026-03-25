<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

// $host = $_SERVER['HTTP_HOST'];

// $subfolder = '/eraasoft/tasks/pmsProject';


// $base = $protocol . '://' . $host . $subfolder;


$base = $_SERVER['PHP_SELF']."/..";
?>