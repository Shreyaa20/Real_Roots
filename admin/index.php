<?php






echo'<!DOCTYPE html>
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
</head>


                   <!-- <div class="navbar-nav ms-auto"
                        <a href="index.html" class="nav-item nav-link">Insert Property</a>
                        <a href="about.html" class="nav-item nav-link">View Properties</a>
                        <a href="about.html" class="nav-item nav-link">Insert Features</a>
                        <a href="about.html" class="nav-item nav-link">Insert Agent</a>
                        <a href="about.html" class="nav-item nav-link">View Agents</a>
                        <a href="about.html" class="nav-item nav-link">All Purchases</a>
                        <a href="about.html" class="nav-item nav-link">List Users</a>
                        <li class="nav-item">
                        <form method="post" action="logout.php">
                        <button style="border:none " type="submit" class="nav-item nav-link" name="logout">Logout</button>
                        </form>
                        </li>
                    </div>-->
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
            <a href="insert_property.php" class="nav-item nav-link">Insert Property</a>
            <a href="view_properties.php" class="nav-item nav-link">View Properties</a>
            
            <a href="insert_agents.php" class="nav-item nav-link">Insert Agent</a>
            <a href="view_agents.php" class="nav-item nav-link">View Agents</a>
            <a href="all_purchases.php" class="nav-item nav-link">All Purchases</a>
            <a href="list_users.php" class="nav-item nav-link">List Users</a>
            <a href="contact.html" class="nav-item nav-link">Log Out</a>
                    
                
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary">RealRoots</span></h1>
                    <h3>"where Dreams find Home"</h3>
                    
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="../img/carousel-1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="../img/carousel-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
</div>

        <!-- Script Section -->
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
';
