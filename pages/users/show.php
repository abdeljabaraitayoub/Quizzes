<?php
include('../../dbcon.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    abort(403);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quizzes</title>
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
                            <!--<div class="col-lg-12 mx-auto">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h1>UTILISATEUR</h1>
                                        <a href='insert.php?id=$id' class="btn btn-primary mb-4 position-relative ">Ajouter</a>
                                    </div>
                                    <table class="table" border=1>
                                        <th class="bg-primary text-white">id</th>
                                        <th class="bg-primary text-white">Nom</th>
                                        <th class="bg-primary text-white">Email</th>
                                        <th class="bg-primary text-white">Role</th>
                                        <th class="bg-primary text-white">Action</th>
                                        <th class="bg-primary text-white">Action</th>
                                        <?php
/*                                        include 'dbcon.php';
                                        $request = "SELECT * FROM users";
                                        $query = mysqli_query($connection, $request);
                                        while ($rows = mysqli_fetch_assoc($query)) {
                                            $id = $rows['id'];
                                            echo "<tr>";
                                            echo "<td>" . $rows['id'] . "</td>";
                                            echo "<td>" . $rows['username'] . "</td>";
                                            echo "<td>" . $rows['email'] . "</td>";
                                            echo "<td>" . $rows['role'] . "</td>";
                                            echo "<td><a href='delete.php?id=$id'>Supprimer</a></td>";
                                            echo "<td><a href='update.php?id=$id'>Modifier</a></td>";
                                            echo "<tr>";
                                        }
                                        */?>
                                    </table>
                                </div>
                            </div>-->
                            <div class="col-lg-12 mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <a href='insert.php' class="btn btn-primary mb-4 position-relative ">+ Ajouter un utilisateur</a>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Nom d'utilisateur</th>
                                                    <th>E-mail</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $request = "SELECT * FROM users";
                                                $query = $connection->query($request);
                                                while ($rows = $query->fetch_assoc()) {
                                                    $id = $rows['id'];
                                                    echo "<tr>";
                                                    echo "<td>" . $rows['username'] . "</td>";
                                                    echo "<td>" . $rows['email'] . "</td>";
                                                    echo "<td>" . (($rows['role'] == 'admin') ? '<label class="badge badge-outline-success">' . $rows['role'] . '</label>' : '<label class="badge badge-outline-info">' . $rows['role'] . '</label>') . "</td>";
                                                    echo "<td><a href='update.php?id=$id'><i class='icon-md text-info mdi mdi-pencil-box'></i></a>
                                                    <a href='delete.php?id=$id'><i class='icon-md text-danger mdi mdi-delete'></i></a></td>";
                                                    echo "<tr>";
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
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