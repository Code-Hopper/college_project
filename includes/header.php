<!-- header.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css -->
    <style>
        <?php include 'assests/css/style.css'; ?>
    </style>
    <!-- bootstarp -->
    <link rel="stylesheet" href="assests/bootstrap-5/css/bootstrap.css">

    <script src="assests/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- fontawsome -->
    <link rel="stylesheet" href="assests/fontawesome/css/all.css">

    <title>College Website</title>
</head>

<body>

    <!-- header content  -->

    <!-- navbar for college website -->

    <div class="container-fluid">
        <div class="container d-flex justify-content-between">
            <div class="navbar-contact d-flex align-items-center gap-3">
                <i class="fa-solid fa-phone"></i> +91 1234567890 <i class="fa-solid fa-envelope"></i>
                example@example.com
            </div>
            <div class="navbar-social-media">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-linkedin"></i>
            </div>
        </div>
    </div>

    <section id="header-2" class="position-sticky top-0 z-3">
        <div class="container-fluid bg-dark">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <a class="navbar-brand fw-bolder fs-1" href="">
                        <i class="fa-solid fa-graduation-cap"></i> College <span class="text-info"> Website </span>
                    </a>

                    <button class="btn navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#mobileoffcanvas">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-end bg-dark text-center" data-bs-backdrop="static"
                        id="mobileoffcanvas">

                        <button class="btn btn-light w-100 d-md-none" data-bs-dismiss="offcanvas">
                            <i class="fa-solid fa-xmark"></i>
                        </button>

                        <ul class="navbar-nav ms-md-auto align-items-center">
                            <li class="nav-items"><a class="nav-link text-info" href="/college_project">Home</a></li>
                            <li class="nav-items"><a class="nav-link text-info" href="/college_project/#about">About Us</a></li>
                            <li class="nav-items">
                                <div class="dropdown">
                                    <button class="nav-link text-info dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Courses
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">BCA</a></li>
                                        <li><a class="dropdown-item" href="#">MCA</a></li>
                                        <li><a class="dropdown-item" href="#">MBA</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-items"><a class="nav-link text-info" href="/college_project/#gallery">Gallery</a></li>
                            <li class="nav-items"><a class="nav-link text-info" href="/college_project/#contact">Contact</a></li>
                            <li class="nav-link">
                                <a class="btn btn-light rounded-pill fw-semibold" href="./student_login.php">Get Addmission</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </section>