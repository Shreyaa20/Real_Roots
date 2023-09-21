<?php
include('./includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Get user input
    $userName = $_POST["userName"];
    $signupEmail = $_POST["signupEmail"];
    $signupPassword = $_POST["signupPassword"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $contact = $_POST["contact"];

    // Database connection information
    $checkEmail = "SELECT * FROM users WHERE email = ?";
    $stmtCheck = $con->prepare($checkEmail);
    $stmtCheck->bind_param("s", $signupEmail);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();
    $stmtCheck->close();
   
    if ($result->num_rows > 0) {
        // User with the same email already exists, handle this case
        echo 'User Already Exists!';
        
    } else {
        // Prepare and execute the SQL query to insert user data
        $sql = "INSERT INTO users (userName, email, password, firstName, lastName, contact)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssss", $userName, $signupEmail, $signupPassword, $firstName, $lastName, $contact);

        if ($stmt->execute()) {
            $registrationSuccess = true;
            header("Location: login.php");
            echo "User registration successful!";
        } else {
            $registrationSuccess = false;
            $errorMessage = "Error: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
        $con->close();
    }
}
?>
