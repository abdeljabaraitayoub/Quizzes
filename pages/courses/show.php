<?php
include('../../dbcon.php');
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
    <style>
        .min {
            min-height: 249px;
        }

        a {
            text-decoration: none !important;
        }

        .plus {
            font-size: 120px;
            font-family: "Nunito", sans-serif;
            font-weight: 500;
            color: #6C7383;
            cursor: pointer;
            opacity: 75%;
        }

        .plus:hover {
            opacity: 100%;
        }

        .card:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;

        }

        .card {
            min-height: 249px;
        }
    </style>
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
                    <!-- content -->
                    <div class="mw-75 mb-3">
                        <div class="row">
                            <!-- show all the courses available -->
                            <?php
                            $query = "SELECT * FROM `courses`";
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card p-3 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                                                <div class="ms-2 c-details">
                                                    <h3 class="mb-2"><?php echo $row['title'] ?></h3>
                                                    <h5><?php echo $row['description'] ?></h5>
                                                </div>
                                            </div>
                                            <div class="badge">
                                                <div class="dropdown">
                                                    <h3 type="button" id="dropdownMenuIconButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        ...
                                                    </h3>
                                                    <div class="dropdown-menu rounded" aria-labelledby="dropdownMenuIconButton2">
                                                        <a class="dropdown-item" href="modifycourse.php?id=<?php echo $row['id'] ?>">modify</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="deletecourse.php?id=<?php echo $row['id'] ?>">delete</a>

                                                    </div>
                                                </div>
                                                <!-- <h3 class="" type="button" id="dropdownMenuIconButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">... </h3> -->
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <p><?php echo substr_replace($row['content'], "...", 470); ?></p>
                                            <!-- <div class=" mt-5">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="mt-3"> <span class="text1">32 Applied <span class="text2">of 50 capacity</span></span> </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } ?>
                            <!-- insert new course -->
                            <div class="col-md-4 mb-4">
                                <div class="card p-3 justify-content-center mb-2 min">
                                    <div class="d-flex justify-content-center">
                                        <a href="createcourse.php">
                                            <h1 class="plus">
                                                +
                                            </h1>
                                        </a>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.php -->
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