<?php
    include "db.php";
    $con = get_connection();
    
    // Check if the form is submitted and the submit button is set
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $name = $_POST['username'];
        $password = $_POST['password'];

        // Insert the data into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$name', '$password')";
        if ($con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Register</h2>
    <form id="registerForm" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Register</button>
    </form>

    <script>
        // Prevent default form submission
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            event.preventDefault();
            // You can add additional validation or AJAX request here if needed
        });
    </script>
</body>
</html>
