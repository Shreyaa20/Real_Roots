<?php
include('./includes/connect.php');
// Check if the form is submitted
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
    echo'User Already Exists!;';
} else {

    // Prepare and execute the SQL query to insert user data
    $sql = "INSERT INTO users (userName, email, password, firstName, lastName,contact)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssss", $userName, $signupEmail, $signupPassword, $firstName, $lastName, $contact);

    if ($stmt->execute()) {
        $registrationSuccess = true;
        echo"User registration successful!";
    } else {
        $registrationSuccess = false;
        $errorMessage = "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $con->close();
}
}
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealRoots - Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    /* Add your CSS styles here */
    body {
        font-family: Arial, sans-serif;';
        echo"background-image: url('./img/signbg2.jpg'); ";
        echo'
        background-size: cover; /* Scale the image to cover the entire body */
        background-repeat: no-repeat; /* Prevent image from repeating */
        background-attachment: fixed;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        width: 360px; /* Increased width */
        height: 700px; /* Increased height */
        perspective: 1000px;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        overflow: hidden;
        margin: auto; /* Center horizontally */
        position: relative; /* Needed for centering vertically */
    }

    .card__inner {
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform 0.5s;
    }
    .form__group {
        margin-bottom: 20px;
    }

    .form__input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn {
        align-items: center;
        padding: 10px 20px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    #toggle-login.active,
    #toggle-signup:not(.active) {
        font-weight: bold;
        color: #4caf50;
    }

    #toggle-signup.active,
    #toggle-login:not(.active) {
        font-weight: bold;
        color: #4285f4;
    }
    h1.heading-secondary {
        text-align: center; /* Center-align the heading */
        color: #4caf50; /* Green color */
        font-weight: bold; /* Bold font weight */
        margin-bottom: 20px; /* Add margin below the heading */
    }
    h3.heading-secondary {
        text-align: center; /* Center-align the heading */
        color: black; 
        font-weight: bold; /* Bold font weight */
        margin-bottom: 20px; /* Add margin below the heading */
    }
    /* Disable pointer events on active form */
    #toggle-login.active, #toggle-signup.active {
        pointer-events: none;
    }
</style>


</head>
<body>
    <div class="signup-container">
        
    <div class="card__back">
                <div id="success-message" class="success-message">
    <!-- Success message will be displayed here -->
                </div>
                <h1 class="heading-secondary">RealRoots</h1>
                <h3 style="text-align: center" class="heading-secondary">Where Dreams find Home</h2>
                <h2 style="text-align: center" class="heading-secondary">Sign Up</h2>
                <form method="post" class="form">
                    <!-- Signup form fields here -->
                     <!-- Signup form fields here -->
                     
                    <div class="form__group">
                        <input
                            type="text"
                            class="form__input"
                            placeholder="Username"
                            name="userName"
                            required
                        />
                    </div>
                    <div class="form__group">
                        <input
                            type="text"
                            class="form__input"
                            placeholder="First Name"
                            name="firstName"
                            required
                        />
                    </div>
                    <div class="form__group">
                        <input
                            type="text"
                            class="form__input"
                            placeholder="Last Name"
                            name="lastName"
                            required
                        />
                    </div>
                    <div class="form__group">
                        <input
                            type="text"
                            class="form__input"
                            placeholder="Contact"
                            name="contact"
                            required
                        />
                    </div>
                    <div class="form__group">
                        <input
                            type="email"
                            class="form__input"
                            placeholder="Email Address"
                            name="signupEmail"
                            required
                        />
                    </div>
                    <div class="form__group">
                        <input
                            type="password"
                            class="form__input"
                            placeholder="Password"
                            name="signupPassword"
                            required
                        />
                    </div>
                    <button type="submit" class="btn btn--green" name="signup">Sign Up</button>
                </form>
                <p style="background-color:white "class="card__toggle">Already have an account? <span id="toggle-login"><a href="http://localhost/project/real-estate-html-template/login.php">Login</span></p>
            </div>
        </div>
</body>
</html>';
?>
