<?php
include('../../dbcon.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    abort(403);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $role = $_POST['role'];

    $errors = [];

    // Validation des données
    if ($password1 != $password2) {
        $errors['password2'] = 'Les mots de passe ne correspondent pas';
    } else {
        if (empty($errors)) {
            $hashedpassword = password_hash($password1, PASSWORD_DEFAULT);

            $query = "INSERT INTO `users` (`username`,`password`,`email`,`role`) VALUES ('$username',  '$hashedpassword','$email', '$role')";
            if (mysqli_query($connection, $query)) {
                header('Location: show.php');
                exit();
            } else {
                echo "Erreur : " . mysqli_error($connection);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Resources</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.ico" />
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <?php include('../../partials/_navbar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <!-- partial:partials/_sidebar.php -->
        <?php include('../../partials/_sidebar.php'); ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-scroller">
                    <div class="container-fluid page-body-wrapper full-page-wrapper">
                        <div class="col-lg-8 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">+ Ajouter un utilisateur</h4>
                                    <form class="forms-sample" action="" method="POST">
                                        <?php if (isset($errors['password2'])): ?>
                                            <p class="text-danger"><?= $errors['password2']; ?></p>
                                        <?php endif; ?>
                                        <div class="form-group row">
                                            <label for="username" class="col-sm-3 col-form-label">Nom d'utilisateur:</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                       name="username"
                                                       class="form-control form-control-lg"
                                                       id="username"
                                                       placeholder="Entrer le nom d'utilisateur ..."
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                            <div class="col-sm-9">
                                                <input type="email"
                                                       name="email"
                                                       class="form-control form-control-lg"
                                                       id="email"
                                                       placeholder="Entrer l'e-mail ..."
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password1" class="col-sm-3 col-form-label">Mot de passe:</label>
                                            <div class="col-sm-9">
                                                <input type="password"
                                                       name="password1"
                                                       class="form-control form-control-lg"
                                                       id="password1"
                                                       placeholder="Entrer le mot de passe ..."
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password2" class="col-sm-3 col-form-label">Rentrer le Mot de passe:</label>
                                            <div class="col-sm-9">
                                                <input type="password"
                                                       name="password2"
                                                       class="form-control form-control-lg"
                                                       id="password2"
                                                       placeholder="Rentrer le Mot de passe ..."
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="role" class="col-sm-3 col-form-label">Role:</label>
                                            <div class="col-sm-9">
                                                <select name="role" class="form-control form-control-lg" required>
                                                    <option value="student">Student</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                        <a href="show.php" class="btn btn-light">Annuler</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('../../partials/_footer.php'); ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../vendors/chart.js/Chart.min.js"></script>
<script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="../../js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../js/dashboard.js"></script>
<script src="../../js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
</body>

</html>