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
                // If the user is logged in, display a logout link
                echo '<li><a href="/logout.php">Logout</a></li>';
            } else {
                // If the user is not logged in, display a login link
                echo '<li><a href="/login.php">Login</a></li>';
            }
            ?> 
        </ul>  
    </nav>
    <?php if(isset($_SESSION['username'])): ?>
    <div class="welcome-message">
        <h2 class="welcome-text">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    </div>
    <?php endif; ?>
</header> 
<main>
    <div class="content">
        <h1>Discover Your Dream Vacation</h1>
        <h4>Experience the ultimate getaway with our fantastic airline vacation deals. Booking your dream trip is hassle-free and convenient with us. Whether you're longing for tropical beaches, cultural exploration, or stunning natural landscapes, we've got you covered.</h4>
        <a href="/offers.php" class="button">Book Now</a>
    </div>
</main>      
</body>
</html>
