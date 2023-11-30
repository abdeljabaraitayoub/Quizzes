<?php include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Balises méta requises -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quizzes</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- CSS du plugin pour cette page -->
    <!-- Fin du CSS du plugin pour cette page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>
<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $query = "SELECT * FROM users where email = '$email'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    if ($password == "" && $email == "") {
        header("location:index.php?error=1");
    } else if ($password == "") {
        header("location:index.php?error=2");
    } else if ($email == "") {
        header("location:index.php?error=3");
    } else {
        if ($row['email'] == $email && password_verify($password, $row['password'])) {
            header('location:home.php?inedx=1');
        } else if ($row['email'] != $email && $row['password'] != $password) {
            header("location:index.php?error=4");
        }
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
                            <?php
                            if (isset($_GET['error'])) {
                                if ($_GET['error'] == 1) {

                                    // echo $_GET['error'];
                                    echo "<strong class=\"text-danger fs-10px\">Username and Password is required!!</strong>";
                                }
                                if ($_GET['error'] == 2) {

                                    // echo $_GET['error'];
                                    echo "<strong class=\"text-danger fs-10px\">Password is required!!</strong>";
                                }
                                if ($_GET['error'] == 3) {

                                    // echo $_GET['error'];
                                    echo "<strong class=\"text-danger fs-10px\">Username is required!!</strong>";
                                }
                                if ($_GET['error'] == 4) {

                                    // echo $_GET['error'];
                                    echo "<strong class=\"text-danger fs-10px\">password or username are wrong</strong>";
                                }
                            } ?>
                            <form class="pt-3" method="post" action="index.php">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mot de passe">
                                </div>
                                <div class="mt-3">
                                    <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">CONNEXION</a> -->
                                    <input value="CONNEXION" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Rester connecté
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Mot de passe oublié?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Vous n'avez pas de compte? <a href="register.php" class="text-primary">Créer</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin du wrapper de contenu -->
        </div>
        <!-- Fin du wrapper du corps de la page -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- JS du plugin pour cette page -->
    <!-- Fin du JS du plugin pour cette page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <!-- endinject -->
</body>

</html>