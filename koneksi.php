<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "ukom_23";

    $conn = new mysqli($server, $user, $pass, $db);

    if($conn->connect_error) {
        die ("Koneksi gagal:" . $conn->connect_error);
    } 

?>