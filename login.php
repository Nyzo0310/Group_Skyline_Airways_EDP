<?php
session_start(); // Start session at the beginning of the script

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    // If the user is logged in, redirect to mainmenu.php
    header("Location: /mainmenu.php");
    exit();
}

include_once 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to select user by username
    $stmt = $conn->prepare("SELECT * FROM res_records WHERE res_email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User exists, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['res_pass'])) {
            // Password is correct, redirect to mainmenu.php
            $_SESSION['username'] = $username;
            header("Location: /index.php");
            exit();
        } else {
            // Incorrect password
            $errorMessage = "Invalid password. Please try again.";
        }
    } else {
        // User does not exist
        $errorMessage = "Invalid username. Please try again.";
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
            <div style="position: relative;">
                <input type="password" name="password" id="password" placeholder="Password" required>
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
