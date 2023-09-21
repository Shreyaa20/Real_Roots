<?php
    include('./includes/connect.php');
    session_start();


    if (isset($_SESSION["userId"])) {
        // The user is logged in
        $userId = $_SESSION["userId"];
    
        
    }

// Write the SQL query
$querysell = "SELECT * FROM property Where Listing='Sell'";
$queryrent = "SELECT * FROM property Where Listing='Rent'";
// Execute the query
$resultsell = mysqli_query($con, $querysell);


// Check if the query was successful

echo'
<!DOCTYPE html>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                            <li class="nav-item">
                        <form method="post" action="logout.php">
                        <button style="border:none " type="submit" class="nav-item nav-link" name="logout">Logout</button>
                        </form>
                        </li>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Property List</h1> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">Property List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="img/header.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->


       


        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <p>"Explore our property listings for your ideal home or investment opportunity."</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-1">For Sell</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2" >For Rent</a>
                            </li>
                        </ul>
                    </div>
                </div>
                ';
                echo'
                <div class="tab-content">
                    
                    <div id="tab-1" class="tab-pane fade show p-0">
                     <div id="sell-properties">';
                if ($resultsell) {
                    while ($property = mysqli_fetch_assoc($resultsell)) {
                        $propertyId = $property['propertyId'];
                        $agentId=$property['agentId'];
                        $propertyStatus = $property['status'];
                        $propertyType = $property['category'];
                        $propertyPrice = $property['price'];
                        $propertyName = $property['propertyName'];
                        $propertyLocation = $property['Location'];
                        $propertysqf = $property['squareFootage'];
                        $propertybed = $property['bedroom'];
                        $propertybath = $property['bathroom'];
                        $propertydescription = $property['description'];
                        // Add more columns as needed
                        $queryagent="SELECT agentName From agents,property Where agents.agentId='$agentId'";
                        $resultagent=mysqli_query($con, $queryagent);
                        $agent=mysqli_fetch_assoc($resultagent);
                        $agentName=$agent['agentName'];
                       
                        echo '<div class="col-lg-4 col-md-6">';
                        echo '<div class="property-item rounded overflow-hidden">';
                        echo '<div class="position-relative overflow-hidden">';
                        echo '<a href=""><img class="img-fluid" src="img/property-' . $propertyId . '.jpg" alt=""></a>';
                        echo '<div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">' . $propertyStatus . '</div>';
                        echo '<div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">' . $propertyType . '</div>';
                        echo '</div>';
                        echo '<div class="p-4 pb-0">';
                        echo '<h5 class="text-primary mb-3">' . $propertyPrice . '</h5>';
                        echo '<a class="d-block h5 mb-2" href="property-details.php?id=' . $propertyId . '">' . $propertyName . '</a>';
                        echo '<p><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $propertyLocation . '</p>';
                        echo '<p><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $propertydescription . '</p>';
                        echo '</div>';
                        echo '<div class="d-flex border-top">';
                        echo '<small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>'. $propertysqf .'</small>';
                        echo '<small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>'. $propertybed .'Bed</small>';
                        echo '<small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>'. $propertybath.'Bath</small></div>';
                        echo '<br><div class="p-4 pb-0">';
                        echo '<h5 class="text-primary mb-3">Agent:'.$agentName.'</h5>';
                        echo '<button class="btn btn-primary btn-book"  data-property-id="' . $propertyId . '" data-user-id="' . $userId . '" data-price="' . $propertyPrice . '" data-agent-id="' . $agentId . '">Book Property</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div><br><br>';}
                    echo'<script>
                           
                                $(".btn-book").click(function() {
        
        var propertyId = $(this).data("property-id");
        var userId = $(this).data("user-id");
        var price = $(this).data("price");
        var agentId = $(this).data("agent-id");
        
        // Send an AJAX request to the server-side script for database insertion
        $.ajax({
            type: "POST", // Use POST or GET depending on your server-side script
            url: "insert.php", // Replace with the URL of your server-side script
            data: {
                propertyId: propertyId,
                userId: userId,
                price: price,
                agentId: agentId
            }, // Data to send to the server
            success: function(response) {
                // Handle the response from the server (if needed)
                alert("Property with ID " + propertyId + " has been booked.");
            },
            error: function(xhr, status, error) {
                // Handle errors (if any)
                console.error(error);
                alert("Error booking the property.");
            }
        });
    });

</script>';
            
                        
                        
}
                 else {
                    echo '<p>No properties found.</p>';
                }
                echo'</div></div>';
                echo'
                <div id="tab-2" class="tab-pane fade show p-0">
                <div id="rent-properties">';
                $queryrent = "SELECT * FROM property Where Listing='Rent'";
                $resultrent = mysqli_query($con, $queryrent);
                if (mysqli_num_rows($resultrent) > 0) {
                    while ($property = mysqli_fetch_assoc($resultrent)) {
                        $propertyId = $property['propertyId'];
                        $agentId=$property['agentId'];
                        $propertyStatus = $property['status'];
                        $propertyType = $property['category'];
                        $propertyPrice = $property['price'];
                        $propertyName = $property['propertyName'];
                        $propertyLocation = $property['Location'];
                        $propertysqf = $property['squareFootage'];
                        $propertybed = $property['bedroom'];
                        $propertybath = $property['bathroom'];
                        $propertydescription = $property['description'];
                        // Add more columns as needed
                        $queryagent="SELECT agentName From agents,property Where agents.agentId='$agentId'";
                        $resultagent=mysqli_query($con, $queryagent);
                        $agent=mysqli_fetch_assoc($resultagent);
                        $agentName=$agent['agentName'];
                        echo '<div class="col-lg-4 col-md-6">';
                        echo '<div class="property-item rounded overflow-hidden">';
                        echo '<div class="position-relative overflow-hidden">';
                        echo '<a href=""><img class="img-fluid" src="img/property-' . $propertyId . '.jpg" alt=""></a>';
                        echo '<div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">' . $propertyStatus . '</div>';
                        echo '<div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">' . $propertyType . '</div>';
                        echo '</div>';
                        echo '<div class="p-4 pb-0">';
                        echo '<h5 class="text-primary mb-3">' . $propertyPrice . '</h5>';
                        echo '<a class="d-block h5 mb-2" href="property-details.php?id=' . $propertyId . '">' . $propertyName . '</a>';
                        echo '<p><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $propertyLocation . '</p>';
                        echo '<p><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $propertydescription . '</p>';
                        echo '</div>';
                        echo '<div class="d-flex border-top">';
                        echo '<small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>'. $propertysqf .'</small>';
                        echo '<small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>'. $propertybed .'Bed</small>';
                        echo '<small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>'. $propertybath.'Bath</small></div>';
                        echo '<br><div class="p-4 pb-0">';
                        echo '<h5 class="text-primary mb-3">Agent:'.$agentName.'</h5>';
                        echo '<button class="btn btn-primary btn-book"  data-property-id="' . $propertyId . '" data-user-id="' . $userId . '" data-price="' . $propertyPrice . '" data-agent-id="' . $agentId . '">Book Property</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div><br><br>';}
                    echo'<script>
                           
                                $(".btn-book").click(function() {
        
        var propertyId = $(this).data("property-id");
        var userId = $(this).data("user-id");
        var price = $(this).data("price");
        var agentId = $(this).data("agent-id");
        
        // Send an AJAX request to the server-side script for database insertion
        $.ajax({
            type: "POST", // Use POST or GET depending on your server-side script
            url: "insert.php", // Replace with the URL of your server-side script
            data: {
                propertyId: propertyId,
                userId: userId,
                price: price,
                agentId: agentId
            }, // Data to send to the server
            success: function(response) {
                // Handle the response from the server (if needed)
                alert("Property with ID " + propertyId + " has been booked.");
            },
            error: function(xhr, status, error) {
                // Handle errors (if any)
                console.error(error);
                alert("Error booking the property.");
            }
        });
    });

</script>';
            
                } else {
                    echo '<p style="text-align=center">No properties found.</p>';
                }echo' </div></div>';                
        echo'
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Whitefield, Bengaluru, Karnataka, India</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 6203319765</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>RealRoots@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Photo Gallery</h5>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-4.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-5.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="img/property-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Share your email to get our latest updates. Your privacy is safe with us. Thanks for your interest!</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">RealRoots</a>All Right Reserved.Designed By <a class="border-bottom" href="technosync.html">TECHNO SYNC</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      


      
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <script src="js/main.js"></script>
    <!-- Add jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
     
       

        // Event handler for clicking the "For Sell" tab
        $("#tab-1-link").click(function () {
            $("#sell-properties").show();
            $("#rent-properties").hide();
        });

        // Event handler for clicking the "For Rent" tab
        $("#tab-2-link").click(function () {
            $("#sell-properties").hide();
            $("#rent-properties").show();
        });
    });
</script>



</body>

</html>';
?>