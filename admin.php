<?php
// Include the configuration file
include './database/config.php';

// Initialize variables
$email = $password = '';
$error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['ad_email'];
    $password = $_POST['ad_password'];

    // Validate user credentials
    $sql = "SELECT * FROM admin_users WHERE ad_email = '$email' AND ad_password = '$password'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Login successful

        while ($row = $result->fetch_assoc()) {
            // Access the "name" column from the current row
            $name = $row['name'];

            // Process the name or do whatever you need with it
            echo "Name: $name <br>";
        }
        $result->free_result(); // Free up the result set when done

        session_start();
        $_SESSION['ad_email'] = $email;
        $_SESSION['ad_name'] = $name;

        // echo "successfull login";
        header("Location: dashboard.php");
        exit();
    } else {
        // Login failed
        $error = "Invalid email or password. Please try again.";
    }
}

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        .login-container {
            width: 300px;
            margin: auto;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-container">
                    <h2>Admin Login Only</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="ad_email" placeholder="Email"
                                value="<?php echo $email; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="ad_password" placeholder="Password"
                                value="<?php echo $password; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <?php echo '<div class="text-danger">' . $error . '</div>'; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>