<?php
// Database connection information
$servername = "localhost"; // Server name
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "quizdb"; // Database name

try {
    // Create a connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connection successful!";
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
