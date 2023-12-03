<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quizzes</title>

    <!-- Plugins: CSS -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">

    <!-- CSS for this page -->
    <!-- End CSS for this page -->

    <!-- Injected CSS -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- End Injected CSS -->

    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- Navbar Partial -->
        <?php include('partials/_navbar.php'); ?>
        <!-- End Navbar Partial -->

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar Partial -->
            <?php include('partials/_sidebar.php'); ?>
            <!-- End Sidebar Partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-scroller">
                        <div class="container-fluid page-body-wrapper full-page-wrapper">
                            <div class="content-wrapper d-flex align-items-center auth px-0">
                                <div class="row w-100 h-100 mx-0">
                                    <div class="col-lg-4 mx-auto">
                                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                            <div class="brand-logo text-center">
                                                <img src="images/youcode.png" alt="logo">
                                            </div>

                                            <form class="pt-3" action="insert.php" method="POST">
                                                <div class="form-group">
                                                    <input type="text" name="username" placeholder="Username"
                                                        class="form-control form-control-lg" required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email"
                                                        class="form-control form-control-lg" required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" name="password" placeholder="Password"
                                                        class="form-control form-control-lg" required>
                                                </div>

                                                <div class="form-group">
                                                    <select name="role" class="form-control form-control-lg" required>
                                                        <option>Student</option>
                                                        <option>Admin</option>
                                                    </select>
                                                </div>

                                                <button type="submit"
                                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                                    Envoyer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="text-center">
                🔗 Class Aziz Resources Hub
            </div>
        </footer>
    </div>

    <!-- Plugins: JS -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- End Plugins: JS -->

    <!-- JS for this page -->
    <!-- End JS for this page -->

    <!-- Injected JS -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <!-- End Injected JS -->
</body>

</html>
