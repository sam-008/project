

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content remains unchanged -->
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $student_id = intval($_GET['id']); // Convert the ID to an integer for security

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "project";

            // Check if the connection to the database is successful
            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['submit'])) {
                    // Validate and retrieve the updated student data from the form fields
                    $updated_name = isset($_POST['updated_name']) ? trim($_POST['updated_name']) : '';
                    $updated_class = isset($_POST['updated_class']) ? trim($_POST['updated_class']) : '';
                    $updated_phone = isset($_POST['updated_phone']) ? trim($_POST['updated_phone']) : '';
                    $updated_email = isset($_POST['updated_email']) ? trim($_POST['updated_email']) : '';
                    $updated_address = isset($_POST['updated_address']) ? trim($_POST['updated_address']) : '';

                    // Validate required fields
                    if (empty($updated_name) || empty($updated_class)) {
                        echo "Name and Class are required fields.";
                    } else {
                        // Use prepared statements to prevent SQL injection
                        $sql = $conn->prepare("UPDATE student SET name=?, class=?, phone=?, email=?, address=? WHERE id=?");
                        $sql->bind_param("sssssi", $updated_name, $updated_class, $updated_phone, $updated_email, $updated_address, $student_id);

                        // Execute the query
                        if ($sql->execute()) {
                            echo "Data updated successfully.";
                            $sql->close();
                            $conn->close();

                            // Redirect to dashboard.php
                            header("Location: dashboard1.php");
                            exit;
                        } else {
                            echo "Error updating data: " . $sql->error;
                        }
                    }
                }
            }

            $sql = "SELECT * FROM student WHERE id = $student_id";
            $result = $conn->query($sql);

            if ($result && $result->num_rows == 1) {
                $row = $result->fetch_assoc();
        ?>
                <!-- Your HTML form remains unchanged -->
        <?php
            } else {
                echo "Student not found.";
            }

            $conn->close();
        } else {
            echo "Invalid request.";
        }
        ?>
    </div>
</body>
</html>

