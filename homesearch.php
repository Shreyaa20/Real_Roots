<?php
include('./includes/connect.php');

if (isset($_POST['home_search'])) {
    $propertyType = $_POST['propertyType'];
    $location = $_POST['location'];
    $select_query = "SELECT * FROM property WHERE type='$propertyType' AND location='$location'";
    $result = mysqli_query($con, $query);
    $number=mysqli_num_rows($result);
    

            echo '<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8">
                <title>RealRoots</title>
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <meta content="" name="keywords">
                <meta content="" name="description">
            
                <!-- Favicon -->
                <link href="img/favicon.ico" rel="icon">
            
                <!-- Google Web Fonts -->
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
                
                <!-- Icon Font Stylesheet -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
            
                <!-- Libraries Stylesheet -->
                <link href="lib/animate/animate.min.css" rel="stylesheet">
                <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
            
                <!-- Customized Bootstrap Stylesheet -->
                <link href="css/bootstrap.min.css" rel="stylesheet">
            
                <!-- Template Stylesheet -->
                <link href="css/style.css" rel="stylesheet">
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
                           <div class="container-fluid nav-bar bg-transparent">
                            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                                <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
                                    <div class="icon p-2 me-2">
                                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                                    </div>
                                    <h1 class="m-0 text-primary">RealRoots</h1>
                                </a>
                                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarCollapse">
                                    <div class="navbar-nav ms-auto">
                                        <a href="index.php" class="nav-item nav-link active">Home</a>
                                        <a href="about.html" class="nav-item nav-link">About</a>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                                            <div class="dropdown-menu rounded-0 m-0">
                                                <a href="property-list.php" class="dropdown-item">Property List</a>
                                                <a href="property-type.php" class="dropdown-item">Property Type</a>
                                                <a href="property-agent.php" class="dropdown-item">Property Agent</a>
                                            </div>
                                        </div>
                                    
                                        <a href="testimonial.html" class="nav-item nav-link">Reviews</a>
                                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <!-- Navbar End -->
            
            
                    <!-- Header Start -->
                    <div class="container-fluid header bg-white p-0">
                        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                            <div class="col-md-6 p-5 mt-lg-5">
                                <h1 class="display-5 animated fadeIn mb-4">Property Search</h1> 
                                    <nav aria-label="breadcrumb animated fadeIn">
                                    <ol class="breadcrumb text-uppercase">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                        <li class="breadcrumb-item text-body active" aria-current="page">Property Search</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6 animated fadeIn">
                                <img class="img-fluid" src="img/header.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    </body>

    </html>';
    if($number>0){
        echo' 
        <br><br>
        ';
 
        while ($row = mysqli_fetch_assoc($result)) {
            // Fetch data for each property
            
            $propertyName = $row['propertyName'];
            $propertyDescription = $row['description'];
            $propertyPrice = $row['price'];
            // Add more columns as needed
            
            // Create a vertical box for each property
            echo '<div class="vertical-box">';
            echo '<h3>' . $propertyName . '</h3>';
            echo '<p>' . $propertyDescription . '</p>';
            echo '<p>Price: $' . $propertyPrice . '</p>';
            // Add more data fields as needed
            echo '</div>';
        }
    } 
    
        else{
                echo'<br><br> <h4 style="text-align:center">No such Property Found!</h4> ';
        }

    
} else {
    // Handle the case where the form is not submitted
    echo"Please select Property type and Location";
}
mysqli_close($con);
?>


            <!-- JavaScript Libraries -->
    
    

    <!-- Template Javascript -->
  
