<?php
include('../../dbcon.php');

if (isset($_GET['id'])) {
    $courseid = $_GET['id'];
    $query = "select * from courses where id = '$courseid'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
}
//  else {
// header('location:show.php');
// }

?>

<!DOCTYPE html>
<html lang="en">

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
                    <div class="card col-md-6 mx-auto">
                        <div class="card-body">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row['title']; ?></h4>
                                <p class="card-description">
                                    <?php echo $row['description']; ?>
                                </p>
                                <div class="card-content">
                                    <p>
                                        <?php echo nl2br($row['content']); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>
                                    <button type="button" class="btn btn-success btn-md">Marquer comme complété</button>
                                    <button type="button" class="btn btn-outline-info btn-md">passer le quizz</button>
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.php -->
                    <?php include('../../partials/_footer.php'); ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>

        </div>
        <!-- partial:partials/_footer.php -->
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