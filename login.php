<?php
session_start(); // Start session at the beginning of the script

// Check if the user is already logged in
if(isset($_SESSION['username'])) {
    // If the user is logged in, redirect to mainmenu.php or admin_dashboard.php
    if ($_SESSION['is_admin'] == 1) {
        header("Location: /admin_dashboard.php");
    } else {
        header("Location: /index.php");
    }
    exit();
}

include_once 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type']; // New line: Get the selected user type from the form

    if ($user_type == 'admin') {
        // Check if the user is an admin
        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $admin_result = $stmt->get_result();

        if ($admin_result->num_rows == 1) {
            // Admin user exists, fetch user details
            $admin_row = $admin_result->fetch_assoc();
            $admin_stored_password = $admin_row['password'];
        
            // Compare plain text passwords
            if ($password === $admin_stored_password) {
                // Password is correct, set session variables
                $_SESSION['username'] = $username;
                $_SESSION['is_admin'] = 1;
                // Redirect to admin dashboard
                header("Location: /admin_dashboard.php");
                exit();
            } else {
                // Incorrect password
                $errorMessage = "Invalid password. Please try again.";
            }
        } else {
            // Admin user does not exist
            $errorMessage = "Invalid username or password. Please try again.";
        }
    } elseif ($user_type == 'regular') {
        // Check if the user is a regular user
        $stmt = $conn->prepare("SELECT * FROM res_records WHERE res_email = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $regular_result = $stmt->get_result();

        if ($regular_result->num_rows == 1) {
            // Regular user exists, fetch user details
            $regular_row = $regular_result->fetch_assoc();
            $regular_stored_password = $regular_row['res_pass'];
            if (password_verify($password, $regular_stored_password)) {
                // Password is correct, set session variables
                $_SESSION['username'] = $username;
                // No need to set is_admin for regular users
                // Redirect to main menu
                header("Location: /index.php");
                exit();
            } else {
                // Incorrect password
                $errorMessage = "Invalid password. Please try again.";
            }
        } else {
            // Regular user does not exist
            $errorMessage = "Invalid username or password. Please try again.";
        }
    } else {
        // Invalid user type
        $errorMessage = "Invalid user type selected.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Skyline - Login</title>
<link rel="icon" href="./assets/images/favicon.jpg">
<link rel="stylesheet" href="./css/login.css">
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
            <?php
            if(isset($_SESSION['username'])) {
                // If the user is logged in, display the logout button
                echo '<li><a href="/logout.php">Logout</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
<main>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required autocomplete="username"><br>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <!-- Swap the positions of "Select User" dropdown and "Show Password" checkbox -->
            <select name="user_type" id="user_type" required>
                <option value="">Select User Type</option>
                <option value="admin">Administrator</option>
                <option value="regular">Regular User</option>
            </select><br>
            <div style="position: relative;">
                
                <input type="checkbox" id="show-password">
                <label for="show-password">Show Password</label>
            </div><br>
            <input type="submit" value="Login">
            <?php if(isset($errorMessage)): ?>
                <p id="errorMessage" style="text-align: center; margin-top: 10px; color: red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            <p style="text-align: center;"><a href="/registration.php">No account? register here</a>.</p>
        </form>
    </div>
</main>
<footer>
    <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
</footer>
<script src="./js/login.js"></script>
</body>
</html>




