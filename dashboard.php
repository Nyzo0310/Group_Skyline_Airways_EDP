<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skyline - Dashboard</title>
    <link rel="icon" href="/assets/images/favicon.jpg">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative; /* Add position relative to the body */
            background-image: url("/assets/images/dashboardbg.jpg"); /* Add background image */
            background-size: cover; /* Cover the entire viewport */
        }

        body::before { /* Pseudo-element for the overlay */
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Transparent dark background */
        }
        .container {
            width: 90%;
            max-width: 700px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.2); /* Lower opacity white background */
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 1; /* Ensure the container appears above the overlay */
        }

        h1 {
            color: white;
            text-align: left;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            background-color: #4E8DF5;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            cursor: pointer;
            display: block;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #356ab4;
        }

        .search-results {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .search-results h2 {
            margin-top: 0;
            color: #333;
        }
         header {
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            padding: 20px 10px; 
            background-color: rgba(0, 0, 0, 0.7); 
            width: 100%; 
            box-sizing: border-box; 
            margin: 0; 
            position: fixed; 
            top: 0; 
            left: 0; 
        }

        .logo {
            display: flex; 
            align-items: center; 
            padding-left: 15px;
        }

        .logo img {
            height: 50px; 
            margin-right: 15px; 
        }

        .title h1 {
            margin: 0;
            color: #fff;
            font-size: 30px; 
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            font-size: 20px;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        
    </style>
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
            <li><a href="/mainmenu.php">Home</a></li>
            <li><a href="#">Flights</a></li>
            <li><a href="#">Bookings</a></li>
            <li><a href="#">Contact</a></li>
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
    <script>
         $(document).ready(function() {
            // When the search button is clicked
            $('#search-button').click(function() {
                // Get form data
                var formData = $('#flight-search-form').serialize();

                // Send AJAX request to searchEngine.php
                $.ajax({
                    url: '/models/searchEngine.php',
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        // Display search results in the designated container
                        $('#search-results').html(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        $(document).ready(function() {
        // When the search button is clicked
        $('#search-button').click(function() {
            // Get form data
            var formData = $('#flight-search-form').serialize();

            // Send AJAX request to searchEngine.php
            $.ajax({
                url: '/models/searchEngine.php',
                type: 'GET',
                data: formData,
                success: function(response) {
                    // Display search results in the designated container
                    $('#search-results').html(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });

        // When the "Book Now" button is clicked
        $(document).on('click', '.book-now-button', function() {
            var flightId = $(this).data('flight-id');
            // Perform the booking action here (e.g., redirect to booking page with flight ID)
            alert('Flight with ID ' + flightId + ' has been booked!');
        });
    });
    </script>
</body>
</html>
