<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skyline - Main menu</title>
    <link rel="icon" href="/assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/mainmenu.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="/assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Airlines PH</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="/dashboard.php">Dashboard</a></li>
            <li><a href="#">Flights</a></li>
            <li><a href="#">Analytics</a></li>
            <?php
            session_start(); // Start the session
            if(isset($_SESSION['username'])) {
                // If the user is logged in, display a welcome message which will serve as the dropdown button
                echo '<div class="dropdown">';
                echo '<button class="dropbtn">Hello, ' . $_SESSION['username'] . '</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="#">Profile</a>';
                echo '<a href="/logout.php" class="logout">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                // If the user is not logged in, display a login link
                echo '<li><a href="/login.php">Login</a></li>';
            }
            ?> 
        </ul>  
    </nav>
</header> 
<main>
    <div class="content">
        <h1>Discover Your Dream Vacation</h1>
        <h4>Experience the ultimate getaway with our fantastic airline vacation deals. Booking your dream trip is hassle-free and convenient with us. Whether you're longing for tropical beaches, cultural exploration, or stunning natural landscapes, we've got you covered.</h4>
        <a href="/offers.php" class="button">Book Now</a>
    </div>
</main>      
<script>
// JavaScript for dropdown functionality
document.addEventListener("DOMContentLoaded", function() {
    var dropdowns = document.getElementsByClassName("dropdown");
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.getElementsByClassName("dropdown-content")[0];
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
});
</script>
</body>
</html>
