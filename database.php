<?php
$servername ="localhost";
$username = "root";
$password = "1234";
$database = "phonebook";

try{
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username,$password);
    //Set the PDO error mode to exception
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connectted succesfully";
}   catch(PDOException $e){{
    echo "Connection failed: " . $e->getMessage();
}
}

?>