<?php
// Include database connection code here
include('../includes/connect.php');

// Query to fetch all agent records
$query = "SELECT * FROM agents";
$result = mysqli_query($con, $query);

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
echo'  <!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin RealRoots</title>
    <!--bootstrap css link-->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <style>
                    /* Add CSS for centering the table and margin collapse */
                    body{
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        margin: 0;
                        padding: 0;
                        height: 100vh;
                        }
                    table {
                        
                        border-collapse: collapse;
                        width: 80%; /* Adjust the width as needed */
                        margin-top: 20px; /* Add margin space below the heading */
                    }
                    table, th, td {
                        border: 1px solid black;
                        text-align: center;
                    }
                    th, td {
                        padding: 10px;
                    }
                </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
       
        <h1 style="text-align:center"class="display-5 animated fadeIn mb-4"><span class="text-primary">RealRoots</span></h1>
        <h1 style="text-align: center">Agents</h1>
    </div>';
    // Start HTML table
    echo '<table border="1">
            <tr>
                <th>Agent Name</th>
                <th>Contact</th>
                <th>License</th>
            </tr>';

    // Fetch and display agent records
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row['agentName'] . '</td>
                <td>' . $row['contact'] . '</td>
                <td>' . $row['liscense'] . '</td>
              </tr>';
    }

    // Close the HTML table
    echo '</table>';
} else {
    echo 'No agent records found.';
}

// Close the database connection
mysqli_close($con);
?>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Custom JavaScript -->
    <script src="../js/main.js"></script>
</body>
</html>
