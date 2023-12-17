<?php
// Define the regular expressions for form validation


// Retrieve form data
$name = $_POST["name"];
$email = $_POST["email"];
$class = $_POST["class"];
$phone = $_POST["phone"];
$address = $_POST["address"];



?>

<?php
$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'project';

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $class = $_POST["class"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $sql = "INSERT INTO  student (name,email, class, phone, address ) VALUES ('$name', '$email','$class','$phone', '$address' )";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.html 
        header("Location: index.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

