
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
    $age = $_POST["age"];
    $photo = $_POST["photo"];

    $sql = "INSERT INTO student (name, age, photo) VALUES ('$name', $age, '$photo')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or do something else
        header("Location: success.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>