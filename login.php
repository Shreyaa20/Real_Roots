<?php
include('./includes/connect.php');
session_start(); // Start a session if not already started

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Get user input
    $loginEmail = $_POST["email"];
    $loginPassword = $_POST["password"];
    // Database connection details
    
    // Prepare and execute a query to check user credentials
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $loginEmail, $loginPassword);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    // Check if a matching user is found
    if ($result->num_rows === 1) {
        // User is authenticated, set session variables or perform further actions as needed
        
        // User is authenticated, set session variables or perform further actions as needed
        $_SESSION["user_email"] = $loginEmail;

// Retrieve the user's userId from the database (assuming you have a users table)
        $sql = "SELECT userId FROM users WHERE email = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $loginEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $_SESSION["userId"] = $row["userId"]; // Set the userId session variable
    }

        $stmt->close();

        header("Location: index.php"); // Redirect to the index.php page on successful login
        exit(); // Terminate the script to prevent further execution
    } else {
        // User login failed, display an alert
        echo '<script>alert("Wrong credentials. Please try again.");</script>';
    }

    $con->close();
}

?>
