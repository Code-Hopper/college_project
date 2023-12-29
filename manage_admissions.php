<?php
// Include the configuration file
include './database/config.php';

// Initialize variables
$searchResult = false;

// Check if the search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['student_search'])) {
    $searchTerm = $_GET['student_search'];

    // SQL query to fetch rows from the admission_forms table based on the search term
    $sql = "SELECT * FROM admission_forms WHERE name = '$searchTerm'";
    $result = $connection->query($sql);

    // Check if there are rows in the search result
    if ($result->num_rows > 0) {
        $searchResult = true;
    }
}

// Check if the "Accept" button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accept_application'])) {
    $studentId = $_POST['student_id'];

    // Update the accepted status in the database
    $updateQuery = "UPDATE admission_forms SET accepted = 1 WHERE id = $studentId";
    $connection->query($updateQuery);

    // Redirect to the same page after updating
    header("Location: dashboard.php");
    exit();
}
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between my-3">
        <h2>Admission Forms</h2>
        <form class="d-flex" action="" method="get">
            <input class="form-control" type="search" placeholder="Enter student ID for searching" name="student_search"
                required>
            <button class="btn btn-primary">Search</button>
            <a href="dashboard.php" class="btn btn-secondary ms-2">Clear</a>
        </form>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><a href="?sort_by=id">ID</a></th>
                <th><a href="?sort_by=name">Name</a></th>
                <th><a href="?sort_by=contact">Contact</a></th>
                <th><a href="?sort_by=email">Email</a></th>
                <th><a href="?sort_by=education">Education</a></th>
                <th><a href="?sort_by=course">Course</a></th>
                <th><a href="?sort_by=ssc_marks">S.S.C. %</a></th>
                <th><a href="?sort_by=hsc_marks">H.S.C. %</a></th>
                <th><a href="?sort_by=graduation">Graduation %</a></th>
                <th><a href="?sort_by=interests">Interests</a></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Output data based on search result or all results
            if ($searchResult) {
                while ($row = $result->fetch_assoc()) {
                    if (!$row["accepted"]) {
                        displayTableRow($row);
                    }
                }
            } else {
                // Display all results if no search or no results in search
                // Fetch and display all students with sorting based on acceptance status
                $sortField = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'id';
                $sqlAll = "SELECT * FROM admission_forms ORDER BY accepted DESC, $sortField";
                $resultAll = $connection->query($sqlAll);

                if ($resultAll->num_rows > 0) {
                    while ($rowAll = $resultAll->fetch_assoc()) {
                        if (!$rowAll["accepted"]) {
                            displayTableRow($rowAll);
                        }
                    }
                } else {
                    echo "<tr><td colspan='11'>0 results</td></tr>";
                }
            }

            // Function to display admission form row
            function displayTableRow($row)
            {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["contact"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["education"] . "</td>";
                echo "<td>" . $row["course"] . "</td>";
                echo "<td>" . $row["ssc_marks"] . "</td>";
                echo "<td>" . $row["hsc_marks"] . "</td>";
                echo "<td>" . $row["graduation"] . "</td>";
                echo "<td>" . $row["interests"] . "</td>";
                echo "<td>
                        <form method='post' action=''>
                            <input type='hidden' name='student_id' value='" . $row["id"] . "'>
                            <button type='submit' class='btn btn-primary' name='accept_application'>Accept</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>