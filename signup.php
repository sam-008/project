<?php
echo"hello";
$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'project';

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql = "INSERT INTO  users (username,email, password, phone ) VALUES ('$username', '$email','$password', '$phone' )";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login_form.html 
        header("Location: loginform.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
