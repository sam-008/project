<?php
// Database configuration
$hostname = 'localhost';  // MySQL server hostname
$username = 'root'; // MySQL username
$password = '';
$dbname='project'; // MySQL password

$con = new mysqli($hostname, $username, $password, $dbname);
if($con) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " ;
}

// Close the connection

?>