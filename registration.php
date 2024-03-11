<?php
include_once 'config/database.php';

$errorMessage = ''; // Initialize error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        $errorMessage = "Passwords do not match.";
    } else {
        // Check if email is already taken
        $stmt = $conn->prepare("SELECT * FROM res_records WHERE res_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errorMessage = "Email already exists.";
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO res_records (res_fname, res_lname, res_email, res_pass) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

            // Execute the statement
            if ($stmt->execute()) {
                // Registration successful, redirect to login page
                header("Location: /login.php");
                exit();
            } else {
                // Registration failed
                $errorMessage = "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skyline - Registration</title>
    <link rel="icon" href="/assets/images/favicon.jpg">
    <style>
         body {
    background-image: url("/assets/images/registration.jpg");
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center;
    background-attachment: fixed; 
    margin: 0;   
        
    }
    .registration-container {
    
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    background-color: rgba(255, 255, 255, 0.4);
    padding: 40px;
    width: 400px;
    text-align: center;
    }
    .registration-container h2 {
    margin-bottom: 20px;
    }
    .registration-container input[type="text"],
    .registration-container input[type="email"],
    .registration-container input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    }
    .registration-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }
    .registration-container input[type="submit"]:hover {
        background-color: green;
    }
    footer {
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 85%;
    color: #fff;
    padding: 20px;
    text-align: center;
    background-color: rgba(255, 255, 255, 0);
}
    </style>
</head>
<body>
    <div class="registration-container">
        <h2 style="text-align: left;">Registration</h2>
        <form id="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="first_name" placeholder="First Name" required><br>
            <input type="text" name="last_name" placeholder="Last Name" required><br>
            <input type="email" name="email" placeholder="Email Address" required><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required><br>
            <input type="submit" value="Register" onclick="return validatePassword()"><br> 
            <?php if(isset($errorMessage)): ?>
                <p style="color: red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            <p style="margin-top: 10px;"><a href="/login.php">Back to login</a>.</p>
        </form>
    </div>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password !== confirm_password) {
                alert("Passwords do not match");
                document.getElementById("password").value = "";
                document.getElementById("confirm_password").value = "";
                return false;
            }
            return true;
        }
    </script>
     <footer>
        <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
    </footer>
</body>
</html>

