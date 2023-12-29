<?php
// Include the configuration file
include './database/config.php';

$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $education = $_POST["education"];
    $course = $_POST["course"];
    $interests = $_POST["interests"];

    // Perform SQL insertion
    $sql = "INSERT INTO users (name, contact, email, password, education, course, interests)
            VALUES ('$name', '$contact', '$email', '$password', '$education', '$course', '$interests')";

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
        // Redirect to the login page after successful registration
        header("Location: student_login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php include("./includes/header.php") ?>

    <div class="container mt-4">
        <h2>Student Registration</h2>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="contact">Contact <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your contact number"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="education">Past Education</label>
                <input type="text" class="form-control" id="education" name="education" placeholder="Enter your past education">
            </div>
            <div class="form-group">
                <label for="course">Course Interested</label>
                <input type="text" class="form-control" id="course" name="course"
                    placeholder="Enter the course you are interested in">
            </div>
            <div class="form-group">
                <label for="interests">Interests</label>
                <textarea class="form-control" id="interests" name="interests" rows="3" placeholder="Enter your interests"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- error code -->
        <!-- Display messages here -->
        <div id="message" class="mt-3 text-success">
            <?php echo $message; ?>
        </div>

    </div>

    <script>
        // You can use JavaScript to further manipulate the message display, 
        // for example, you can hide the message after a certain duration
        setTimeout(function () {
            document.getElementById("message").style.display = "none";
        }, 5000); // Hide after 5 seconds
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="mt-4"></div>
    <?php include("./includes/footer.php") ?>

</body>

</html>