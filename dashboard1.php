<?php
    session_start();

    // Check if the user is authenticated
    if (!isset($_SESSION["id"])) {
        header("Location: login.php"); // Redirect to login page
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>School Information System</title>
    <link rel="stylesheet" href="./css/styles.css">

     
  <style>
    body{
	   background: url("./img/blue-curve-frame-template_53876-114605.avif");
	   background-size: 100% 120%;
    }

  </style>
</head>
<body>
<div class="header">
 <img src="./img/logo1.png" style="height:150px ; width:150px;">
  <h1 style="font-size: 70px;" > SHREE MAHENDRA RASTRYA BASIC SCHOOL</h1>

     <p style="font-size: 35px;"> Pokhara-20, Bhalam </p>
  
</div>
    <h1 style="font-size: 40px;">Possible Students for Admission</h1>
    <div class="navbar">
        
        <a href="nav1.php"   style="font-size: 25px;">Add Data</a>
        <a href="logout.php"  style="font-size: 25px;">Logout</a> <!-- Add this link -->
    </div>
    <br><br>

    
    
    <!-- Display the list of students from the database in a table -->
    <h2>Student List:</h2>
    <table border="5">
        <tr  style="font-size: 30px;"  >
            <th>ID</th>
            <th>Name</th>
            <th>class</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        // Fetch data from the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "project";

        // Create a connection to the existing database
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SELECT query to fetch data from the "student" table
        $sql = "SELECT * FROM student";

        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["class"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>
                    <form action='edit_student_data.php?id=" . $row["id"] . "' method='post'>
                        <input type='submit' value='Edit'>
                    </form>
                  </td>";
                echo "<td><form action='delete_student_data.php' method='post'>
                          <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                          <input type='submit' value='Delete'>
                      </form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found.</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
    <!-- JavaScript code to show the prompt for success message -->
<script>



</body>
</html>