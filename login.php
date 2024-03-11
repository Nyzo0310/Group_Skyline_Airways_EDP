<?php
session_start(); // Start session at the beginning of the script
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
            // Password is correct, redirect to dashboard
            $_SESSION['username'] = $username;
            header("Location: /mainmenu.php");
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
<link rel="icon" href="/assets/images/favicon.jpg">
<style>
body {
    background-image: url("/assets/images/login.jpg");
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    margin: 0;
    overflow-x: hidden;
}
main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%; /* Set height to viewport height */
    padding: 20px;
}

.login-container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.4);
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    padding: 50px;
    width: 400px;
}
header {
    height: 50px;
    color: #fff;
    padding: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3s);
    background-color: rgba(255, 255, 255, 0);
    text-align: center;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}
header h1 {
    display: block;
    color: white;
    font-size: 50px;
    height: 30px;
    font-style: italic;
}
header p {
    color: white;
    font-size: 16px;
    height: 20px;
}

footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    color: #fff;
    padding: 20px;
    text-align: center;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3s);
    background-color: rgba(255, 255, 255, 0);
}

nav {
    display: flex;
    justify-content: center;
}

/* CSS for List */
nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
}

nav ul li {
    margin: 0 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

.login-container h2 {
    margin-bottom: 20px;
    text-align: center;
}

.login-container input[type="text"],
.login-container input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-container input[type="checkbox"] {
    margin-right: 6px;
}

.login-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    opacity: 1;
}

.login-container input[type="submit"]:hover {
    background-color: green;
}
</style>
</head>
<body>
    <header>
    <h1>Skyline Airways</h1>
    <p>Your Trusted Travel Companion</p><br>
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
    <script>
    // JavaScript code to clear error message on input
    document.getElementById("username").addEventListener("input", clearErrorMessage);
        document.getElementById("password").addEventListener("input", clearErrorMessage);

        function clearErrorMessage() {
            var errorMessage = document.getElementById("errorMessage");
            if (errorMessage) {
                errorMessage.textContent = ""; // Clear the error message
            }
        }
        
        // JavaScript code to toggle password visibility
        document.getElementById("show-password").addEventListener("change", function() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });
    </script>
</body>
</html>
