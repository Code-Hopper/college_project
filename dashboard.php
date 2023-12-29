<?php
// Start the session
session_start();

function logout() {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: admin.php");
    exit();
}

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    logout();
}

// Check if the user is logged in
if (!isset($_SESSION['ad_email'])) {
    // Redirect to the login page if not logged in
    header("Location: admin.php");
    exit();
}

// Include the configuration file
include './database/config.php';

?>

<?php include("./includes/header.php") ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <span class="fs-1">Hello, <span class="text-primary">
                        <?php echo $_SESSION['ad_name'] ?>!
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

<div class="container-fluid">
    <div class="container">
        <div class="row p-3">
            <div class="col-3 shadow-lg admin-action rounded bg-dark">
                <div class="">
                    <div>
                        <span class="text-light fw-bold fs-3">Admin <span class="text-danger">Actions</span></span>
                    </div>
                    <div class="action-container">
                        <button class="btn m-0 p-0 w-100" onclick="showContent('checkStudents')">
                            <hr class="text-light">
                            <div class="">
                                <div class="row p-3">
                                    <div class="col-2">
                                        <i class="text-primary fa-solid fa-business-time fa-2x"></i>
                                    </div>
                                    <div class="col-10">
                                        <span class="text-light fw-semibold">Check Students</span>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <button class="btn m-0 p-0 w-100" onclick="showContent('admissionApplications')">
                            <hr class="text-light">
                            <div class="">
                                <div class="row p-3">
                                    <div class="col-2">
                                        <i class="text-primary fa-solid fa-inbox fa-2x"></i>
                                    </div>
                                    <div class="col-10">
                                        <span class="text-light fw-semibold">Admission Applications</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-light">
                        </button>
                        <button class="btn m-0 p-0 w-100" onclick="showContent('admitedStudents')">
                            <div class="">
                                <div class="row p-3">
                                    <div class="col-2">
                                        <i class="text-primary fa-solid fa-comment fa-2x"></i>
                                    </div>
                                    <div class="col-10">
                                        <span class="text-light fw-semibold">Accepted Student</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-light">
                        </button>
                    </div>
                </div>

            </div>
            <div class="col data-display">
                <div id="checkStudents" class="content-section">
                    <!-- ... (content for 'Check Students' section) -->
                    <?php include("./manage_students.php")?>
                </div>

                <div id="admissionApplications" class="content-section" style="display: none;">
                    <!-- ... (content for 'Admission Applications' section) -->
                    <?php include("./manage_admissions.php")?>
                </div>  
                <div id="admitedStudents" class="content-section" style="display: none;">
                    <!-- ... (content for 'Admission Applications' section) -->
                    <?php include("./admited_students.php")?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./includes/footer.php") ?>