<?php include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Balises meta requises -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quizzes</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>
<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['condition'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $hashedpassword = password_hash($password1, PASSWORD_DEFAULT);
    $condition = $_POST['condition'];
    // echo $name . ' ' . $email . ' ' . $password1 . ' ' . $password2 . ' ' . $condition;
    $query = "INSERT INTO `users` (`username`,`password`,`email`,`role`) VALUES ('$name',  '$hashedpassword','$email', 'student')";
    if ($password1 == $password2) {
        if (mysqli_query($connection, $query)) {
            header('location:index.php?');
        }
    } else  if ($password1 != $password2) {
        header("location:register.php?error=1");
    }
}
?>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="images/youcode.png" alt="logo">
                            </div>
                            <form class="pt-3" method="post" action="register.php">
                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 1) {

                                        // echo $_GET['error'];
                                        echo "<strong class=\"text-danger fs-10px\">The password doasen't match!!</strong>";
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Nom d'utilisateur" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <!-- <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                                        <option>Pays</option>
                                        <option>États-Unis d'Amérique</option>
                                        <option>Royaume-Uni</option>
                                        <option>Inde</option>
                                        <option>Allemagne</option>
                                        <option>Argentine</option>
                                    </select> -->
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password1" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mot de passe" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password2" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Rentrer le Mot de passe" required>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="condition" class="form-check-input" required>
                                            J'accepte toutes les conditions générales
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.php">S'INSCRIRE</a> -->
                                    <input value="S'INSCRIRE" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">

                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Vous avez déjà un compte ? <a href="index.php" class="text-primary">Connexion</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>