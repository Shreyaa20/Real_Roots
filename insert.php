<?php
include('./includes/connect.php');

// Check if the request is a POST request and if the required data is provided
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["propertyId"], $_POST["userId"], $_POST["price"], $_POST["agentId"])) 
   { $propertyId = $_POST["propertyId"];
    $userId = $_POST["userId"];
    $price = $_POST["price"];
    $agentId = $_POST["agentId"];
    
        // Insert the property into the database
        $insert_query = "INSERT INTO purchases(propertyId,userId, price, agentId ) 
                         VALUES ('$propertyId', '$userId', '$price', '$agentId')";
        $result = mysqli_query($con, $insert_query);
        
        
    }

?>

 
   