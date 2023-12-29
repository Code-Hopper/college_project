<?php
// Start the session
session_start();

function logout() {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: student_login.php");
    exit();
}

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    logout();
}

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    header("Location: student_login.php");
    exit();
}

// Include the configuration file
include './database/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $education = $_POST['education'];
    $course = $_POST['course'];
    $sscMarks = $_POST['ssc_marks']; // Added
    $hscMarks = $_POST['hsc_marks']; // Added
    $graduation = $_POST['graduation']; // Added
    $interests = $_POST['interests'];

    // Check if the student has already submitted the form
    $checkSubmissionQuery = "SELECT * FROM admission_forms WHERE student_email = '{$_SESSION['email']}'";
    $existingSubmission = $connection->query($checkSubmissionQuery);

    if ($existingSubmission->num_rows == 0) {
        // Insert the form data into the database
        $insertQuery = "INSERT INTO admission_forms (id, student_email, name, contact, education, course, ssc_marks, hsc_marks, graduation, interests)
                        VALUES ('{$_SESSION['user_id']}', '{$_SESSION['email']}', '$name', '$contact', '$education', '$course', '$sscMarks', '$hscMarks', '$graduation', '$interests')";
        $connection->query($insertQuery);
        $submissionMessage = "Form submitted successfully!";
    } else {
        $submissionMessage = "You have already submitted the form.";
    }
}

// Check if the student's submission has been accepted (assuming 'accepted' column in the admission_forms table)
$checkAcceptanceQuery = "SELECT accepted FROM admission_forms WHERE student_email = '{$_SESSION['email']}'";
$acceptanceResult = $connection->query($checkAcceptanceQuery);

$accepted = false;
if ($acceptanceResult->num_rows > 0) {
    $accepted = (bool) $acceptanceResult->fetch_assoc()['accepted'];
}

?>

<?php include("./includes/header.php") ?>


<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <span class="fs-1">Hello, <span class="text-primary">
                        <?php echo $_SESSION['name']." ".$_SESSION['user_id'] ?>!
                    </span></span>
            </div>
            <div class="col d-flex align-items-center justify-content-end">
                <!-- Logout Button Form -->
                <form method="post">
                    <button type="submit" class="btn btn-danger" name="logout">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <?php if (isset($submissionMessage)) : ?>
    <div class="alert <?php echo $existingSubmission->num_rows > 0 ? 'alert-warning' : 'alert-success'; ?>"
        role="alert">
        <?php echo $submissionMessage; ?>
    </div>
    <?php endif; ?>

    <div class="bg-dark rounded p-5">

        <h2 class="text-warning bg-danger p-2">Admission Form</h2>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="education">Past Education</label>
                        <input type="text" class="form-control" id="education" name="education" placeholder="Past Education" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="course">Course Interested</label>
                        <!-- <input type="text" class="form-control" id="course" name="course" required> -->
                        <select class="form-select" name="course" id="" required>
                            <option value="Course 1">Course 1</option>
                            <option value="Course 1">Course 2</option>
                            <option value="Course 1">Course 3</option>
                            <option value="Course 1">Course 4</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="contact">S.S.C. %</label>
                        <input type="text" class="form-control" id="ssc_marks" name="ssc_marks" placeholder="S.S.C." required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="contact">H.S.C. %</label>
                        <input type="text" class="form-control" id="hsc_marks" name="hsc_marks" placeholder="H.S.C." required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="contact">Graduation %</label>
                        <input type="text" class="form-control" id="graduation" name="graduation" placeholder="Graduation" required>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="interests">Interests</label>
                <textarea class="form-control" id="interests" name="interests" rows="3" placeholder="if any message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <?php if ($accepted) : ?>
    <div class="alert alert-success mt-3" role="alert">
        Congratulations! Your submission has been accepted. College Staff will contact you soon.
        
    </div>
    <?php endif; ?>
</div>

<?php include("./includes/footer.php") ?>