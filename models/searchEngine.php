<?php
    // Include the database connection file
    include_once '../config/database.php';

    // Check if the database connection is established
    if ($conn) {
        // Check if the form has been submitted
        if(isset($_GET['from']) && isset($_GET['to']) && isset($_GET['date'])) {
            // Fetch search parameters from the form
            $from = $_GET['from'];
            $to = $_GET['to'];
            $date = $_GET['date'];

            // SQL query to search for flights
            $sql = "SELECT * FROM sf_records WHERE sf_departure_location = '$from' AND sf_arrival_location = '$to' AND DATE(sf_departure_datetime) = '$date'";
            $result = $conn->query($sql);

            // Check if any flights were found
            if ($result->num_rows > 0) {
                // Output table header
                echo "<table>";
                echo "<tr><th>Flight Number</th><th>Departure</th><th>Arrival</th><th>Price</th><th>Book </th></tr>";

                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["sf_id"] . "</td>";
                    echo "<td>" . $row["sf_departure_location"] . " (" . $row["sf_departure_datetime"] . ")</td>";
                    echo "<td>" . $row["sf_arrival_location"] . " (" . $row["sf_arrival_datetime"] . ")</td>";
                    echo "<td>$" . $row["sf_price"] . "</td>";
                    echo "<td><button class='book-now-button' data-flight-id='" . $row["sf_id"] . "'>Book Now</button></td>";
                    echo "</tr>";  
                }

                echo "</table>";
            } else {
                echo "No flights found.";
            }
        }
        // Close the database connection
        $conn->close();
    } else {
        echo "Failed to connect to the database.";
    }
    
?>
