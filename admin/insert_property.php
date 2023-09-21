<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_property'])){
        // Retrieve form data
        $propertyName = $_POST["property_name"];
        $type = $_POST["category"];
        $price = $_POST["price"];
        $location = $_POST["location"];
        $agentId = $_POST["agentId"];
        $bedrooms = $_POST["bedroom"];
        $bathrooms = $_POST["bathroom"];
        $description = $_POST["description"];
        $sqFoot = $_POST["sqFootage"];
        $status = $_POST["status"];
        $listing = $_POST["listing"];

        // Check if the property with the same name and location already exists
        $select_query = "SELECT * FROM property WHERE propertyName='$propertyName' AND location='$location'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        
        if($number > 0){
            echo "<script>alert('Property already exists!'); window.location.href='insert_property.php';</script>";
        }
        else {
            // Insert the property into the database
            $insert_query = "INSERT INTO property (propertyName, category, price, location, agentId, bedroom, bathroom, description, squareFootage, status, Listing) 
                             VALUES ('$propertyName', '$type', '$price', '$location', '$agentId', '$bedrooms', '$bathrooms', '$description', '$sqFoot', '$status', '$listing')";
            $result = mysqli_query($con, $insert_query);
            
            if($result){
                echo "<script>alert('Property Inserted successfully'); window.location.href='insert_property.php';</script>";
            }
            else {
                echo "<script>alert('Property Insertion Failed!'); window.location.href='insert_property.php';</script>";
            }
        }
    }
?>

<!DOCTYPE html>
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

    <!-- Libraries Stylesheet 
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">-->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <style>
        /* Custom CSS to center the form and add padding */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            
            padding:20px;
             /* Adjust the padding as needed */
        }
        form{
            width:100%;
            max-width:500px;
            display:grid;
            gap:10px;
        }
        label{
            text-align:right;}
        h1{
            margin-bottom:10px;
        
        }
        
        /* Style the form */
        

        /* Style form elements */
        
    </style>
</head>

<body>

    
    <div class="container-xxl bg-white p-0">
         
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        

<h1 style="text-align:center"class="display-5 animated fadeIn mb-4"><span class="text-primary">RealRoots</span></h1>
    <h1 style="text-align: center">Insert Property</h1>
    <div class="container">
    <form method="post">
        
        <input type="text" name="property_name" placeholder="Property Name"required><br>

        
        <select  name="type" placeholder="Type">
        <option >Apartment</option>
        <option >Society</option>
        <option >Building</option>
        <option >Home</option>
        <option >Office</option>
        <option >Shop</option>

        <!-- Add more options as needed -->
    </select><br>

        
        <input type="text" name="price" placeholder="Price"required><br>
        <input type="text" name="location" placeholder="Location"required><br>
        <input type="int" name="agentId" placeholder="AgentId"required><br>
        <input type="number" name="bedroom" placeholder="Bedroom(s)"required><br>
        <input type="number" name="bathroom" placeholder="Bathroom(s)"required><br>
        <input type="text" name="description" placeholder="Description"required><br>
        <input type="text" name="sqFootage" placeholder="square Footage"required><br>
        <select  name="status" placeholder="Status">
        <option >Available</option>
        <option >Sold</option>
    </select>
    <br>
        
        <input type="text" name="listing" placeholder="Listing"required><br>



        <input type="submit" name="insert_property" value="Submit">
    </form>
</div>


        

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../lib/wow/wow.min.js"></script>
       <!-- <script src="../lib/easing/easing.min.js"></script>
        <script src="../lib/waypoints/waypoints.min.js"></script>
        <script src="../lib/owlcarousel/owl.carousel.min.js"></script>-->

        
        <script src="../js/main.js"></script>
</body>
</html>

