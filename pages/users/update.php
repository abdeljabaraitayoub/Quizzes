<?php
include('../../dbcon.php');

$id = $_GET['id'];
$data = "SELECT * FROM users WHERE id = $id" ;
$result = $connection->query($data);


if ($result) {
    $userData = $result->fetch_assoc();
} else {
    echo "Erreur lors de la récupération des utilisateurs : " . $connection->error;
}

if(isset($_POST['edit']))  {

    $username = $_POST['editUserName'];
    $email = $_POST['editUserEmail'];
    $role = $_POST['editUserRole'];

    $sql = "UPDATE users SET username = '$username', email = '$email', role = '$role' WHERE id = '$id'";

    if ($connection->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour de l'enregistrement : " . $connection->error;
    }

    header("Location: show.php");

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
                                            <label for="editUserName" class="col-sm-3 col-form-label">Nom d'utilisateur:</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                       name="editUserName"
                                                       class="form-control form-control-lg"
                                                       id="editUserName"
                                                       placeholder="Entrer le nouveau nom d'utilisateur ..."
                                                       value="<?php echo $userData['username']; ?>"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="editUserEmail" class="col-sm-3 col-form-label">Email:</label>
                                            <div class="col-sm-9">
                                                <input type="email"
                                                       name="editUserEmail"
                                                       class="form-control form-control-lg"
                                                       id="editUserEmail"
                                                       placeholder="Entrer le nouveau e-mail ..."
                                                       value="<?php echo $userData['email']; ?>"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="editUserRole" class="col-sm-3 col-form-label">Role:</label>
                                            <div class="col-sm-9">
                                                <select name="editUserRole" class="form-control form-control-lg" required>
                                                    <option value="student" <?php if ($userData['role'] == 'student') echo 'selected'; ?>>Student</option>
                                                    <option value="admin" <?php if ($userData['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button name="edit" type="submit" class="btn btn-primary mr-2">Enregistrer</button>
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