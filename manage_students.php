<?php
// Include the configuration file
include './database/config.php';

// Initialize variables
$searchResult = false;

// Check if the search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['student_search'])) {
    $searchTerm = $_GET['student_search'];

    // SQL query to fetch rows from the users table based on the search term (assuming ID is used for search)
    $sql = "SELECT * FROM users WHERE name = '$searchTerm'";
    $result = $connection->query($sql);

    // Check if there are rows in the search result
    if ($result->num_rows > 0) {
        $searchResult = true;
    }
}
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between my-3">
        <h2>Manage Students</h2>
        <form class="d-flex" action="" method="get">
            <input class="form-control" type="search" placeholder="Enter student ID for searching" name="student_search" required>
            <button class="btn btn-primary">Search</button>
            <a href="dashboard.php" class="btn btn-secondary ms-2">Clear</a>
        </form>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Education</th>
                <th>Course</th>
                <th>Interests</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Output data based on search result or all results
            if ($searchResult) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["contact"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["education"] . "</td>";
                    echo "<td>" . $row["course"] . "</td>";
                    echo "<td>" . $row["interests"] . "</td>";
                    echo "<td>
                            <form method='post' action='delete_student.php'>
                                <input type='hidden' name='student_id' value='" . $row["id"] . "'>
                                <button type='submit' class='btn btn-danger' name='delete_student'>Delete</button>
                            </form>
                            <button class='btn btn-primary'>Form</button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                // Display all results if no search or no results in search
                // Fetch and display all students
                $sqlAll = "SELECT * FROM users";
                $resultAll = $connection->query($sqlAll);

                if ($resultAll->num_rows > 0) {
                    while ($rowAll = $resultAll->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $rowAll["id"] . "</td>";
                        echo "<td>" . $rowAll["name"] . "</td>";
                        echo "<td>" . $rowAll["contact"] . "</td>";
                        echo "<td>" . $rowAll["email"] . "</td>";
                        echo "<td>" . $rowAll["education"] . "</td>";
                        echo "<td>" . $rowAll["course"] . "</td>";
                        echo "<td>" . $rowAll["interests"] . "</td>";
                        echo "<td>
                                <form method='post' action='delete_student.php'>
                                    <input type='hidden' name='student_id' value='" . $rowAll["id"] . "'>
                                    <button type='submit' class='btn btn-danger' name='delete_student'>Delete</button>
                                </form>
                                <button class='btn btn-primary'>Form</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>0 results</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
