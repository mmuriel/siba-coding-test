<?php

$servername = "db:3306";
$username = "root";
$password = "PesoTalloAvionCamino3310*";
$db_name = "db";

function makeConn(){
    global $servername, $username, $password, $db_name;
    $conn = mysqli_connect($servername, $username,$password,$db_name);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>
