<?php
//defining
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
//connect
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//if false
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>