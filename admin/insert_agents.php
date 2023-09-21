<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_agent'])){
     // Retrieve form data
        $agentName = $_POST["agent_name"];
        $agentContact = $_POST["agent_contact"];
        $agentLiscense = $_POST["agent_liscense"];

        $select_query = "SELECT * FROM agents WHERE agentName='$agentName' AND contact='$agentContact'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('Agent already exists!');window.location.href='insert_agents.php';</script>";
        }
        else{
        $insert_query = "INSERT INTO agents (agentName, contact, liscense) VALUES ('$agentName', '$agentContact', '$agentLiscense')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Agent Inserted successfully'); window.location.href='insert_agents.php';</script>";
        }
        else
        {
            echo "<script>alert('Agent Insertion Failed!');window.location.href='insert_agents.php';</script>";
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
    <h1 style="text-align: center">Insert Agent</h1>
    <div class="container">
    <form method="post">
        
        <input type="text" name="agent_name" placeholder="Agent Name"required><br>

        
        <input type="text" name="agent_contact" placeholder="Contact No." required><br>

        
        <input type="text" name="agent_liscense" placeholder="Liscence"required><br>


        <input type="submit" name="insert_agent" value="Submit">
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
