<?php
include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $errors = [];

    // Validation des données
    if (empty($username)) {
        $errors['username'] = 'Le nom d\'utilisateur est requis';
    } elseif (empty($email)) {
        $errors['email'] = 'L\'adresse e-mail est requise';
    } elseif (empty($password1)) {
        $errors['password1'] = 'Un mot de passe est requis';
    } elseif (empty($password2)) {
        $errors['password2'] = 'Veuillez confirmer votre mot de passe';
    } elseif ($password1 != $password2) {
        $errors['password2'] = 'Les mots de passe ne correspondent pas';
    } else {
        if (empty($errors)) {
            $hashedpassword = password_hash($password1, PASSWORD_DEFAULT);

            $query = "INSERT INTO `users` (`username`,`password`,`email`,`role`) VALUES ('$username',  '$hashedpassword','$email', 'student')";
            if (mysqli_query($connection, $query)) {
                header('Location: index.php');
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
                            <form class="pt-3" method="POST" action="">
                                <div class="form-group">
                                    <?php if (isset($errors['username'])) : ?>
                                        <p class="text-danger"><?= $errors['username'] ?></p>
                                    <?php endif; ?>
                                    <input type="text" name="username" class="form-control form-control-lg" id="username" value="<?php echo $_POST['username'] ?>" placeholder="Nom d'utilisateur">
                                </div>
                                <div class="form-group">
                                    <?php if (isset($errors['email'])) : ?>
                                        <p class="text-danger"><?= $errors['email'] ?></p>
                                    <?php endif; ?>
                                    <input type="email" name="email" class="form-control form-control-lg" id="email" value="<?php echo $_POST['email'] ?>" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <?php if (isset($errors['password1'])) : ?>
                                        <p class="text-danger"><?= $errors['password1'] ?></p>
                                    <?php endif; ?>
                                    <input type="password" name="password1" class="form-control form-control-lg" id="password1" value="<?php echo $_POST['password1'] ?>" placeholder="Mot de passe">
                                </div>
                                <div class="form-group">
                                    <?php if (isset($errors['password2'])) : ?>
                                        <p class="text-danger"><?= $errors['password2'] ?></p>
                                    <?php endif; ?>
                                    <input type="password" name="password2" class="form-control form-control-lg" id="password2" placeholder="Rentrer le Mot de passe">
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="condition" class="form-check-input">
                                            J'accepte toutes les conditions générales
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
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
    <!-- endinject -->
</body>

</html>