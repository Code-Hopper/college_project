<?php
// Include the configuration file
include './database/config.php';

// Check if the delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_student'])) {
    // Get the student ID from the form
    $studentId = $_POST['student_id'];

    // SQL query to delete the student from the users table
    $deleteQuery = "DELETE FROM users WHERE id = '$studentId'";
    if ($connection->query($deleteQuery) === TRUE) {
        // Redirect back to the page where the delete button was clicked
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}
?>
