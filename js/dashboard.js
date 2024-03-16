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