<?php 
    //Start Session
    session_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/project12');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'dang_ki_tin_chi');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME); //SElecting Database


?>
