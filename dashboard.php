<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skyline - Dashboard</title>
    <link rel="icon" href="/assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/dashboard.css">
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
            <li><a href="/index.php">Home</a></li>
            <li><a href="#">Flights</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="/contact.php">Contact</a></li>
        </ul>
    </nav>
</header>
   <div class="container">
        <h1>Search Flights</h1>

        <!-- Flight search form -->
        <form id="flight-search-form">
            <label for="from" style="color: white;">From:</label>
            <input type="text" id="from" name="from" placeholder="Departure city" required>
            <label for="to" style="color: white;">To:</label>
            <input type="text" id="to" name="to" placeholder="Destination city" required>
            <label for="date" style="color: white;">Date:</label>
            <input type="date" id="date" name="date" required>
            <button type="button" id="search-button">Search Flights</button>
        </form>

        <!-- Display search results -->
        <h2 id="search-results-title" style="color: white;">Available Flights</h2>
        <div class="search-results" id="search-results">
        </div>
    </div>

    <!-- Add jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/dashboard.js"></script>
</body>
</html>
