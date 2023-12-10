<?php
include('dbcon.php');
// Démarrer la session pour accéder aux variables de session
session_start();

// Vérifier si l'utilisateur est autorisé pour consulter cette page
if (!isset($_SESSION['user_id'])) {
    abort(403);
}
$sql_users = "SELECT COUNT(*) FROM users";
$sql_quiz = "SELECT COUNT(*) FROM quizzes";

$nbrUsers = $connection->query($sql_users)->fetch_row()[0];
$nbrQuiz = $connection->query($sql_quiz)->fetch_row()[0];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quizzes</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <?php include('partials/_navbar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <?php include('partials/_sidebar.php'); ?>
      <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h3 class="font-weight-bold">Bienvenue <?php echo $_SESSION['username']; ?>!!</h3>
                                <h6 class="font-weight-normal mb-0">Je vous souhaite une <span class="text-primary">excellente</span> journée !</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin transparent">
                        <div class="row">
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-tale">
                                    <div class="card-body">
                                        <p class="mb-4">Nombre total de quiz passés</p>
                                        <p class="fs-30 mb-2"><?php echo $nbrQuiz ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-dark-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Nombre total d'utilisateurs enregistrés</p>
                                        <p class="fs-30 mb-2"><?php echo $nbrUsers ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">la progression des étudiants dans chaque cours</p>
                                <div class="charts-data">
                                    <?php
                                    $sql_courses = "SELECT id, title FROM courses";
                                    $result_courses = $connection->query($sql_courses);

                                    if ($result_courses->num_rows > 0) {
                                        while ($course_row = $result_courses->fetch_assoc()) {
                                            $course_id = $course_row["id"];
                                            $course_title = $course_row["title"];

                                            // Fetch the average progress of users for the current course
                                            $sql_avg_progress = "SELECT AVG(progress) as avg_progress FROM user_courses WHERE course_id = $course_id";

                                            $result_avg_progress = $connection->query($sql_avg_progress);
                                            $avg_progress_row = $result_avg_progress->fetch_assoc();
                                            $avg_progress = $avg_progress_row["avg_progress"];

                                            echo '<div class="mt-3">';
                                            echo '<p class="mb-0">' . $course_title . '</p>';
                                            echo '<div class="d-flex justify-content-between align-items-center">';
                                            echo '<div class="progress progress-md flex-grow-1 mr-4">';
                                            echo '<div class="progress-bar bg-info" role="progressbar" style="width: ' . $avg_progress . '%" aria-valuenow="' . $avg_progress . '" aria-valuemin="0" aria-valuemax="100"></div>';
                                            echo '</div>';
                                            echo '<p class="mb-0">' . number_format($avg_progress, 2) . '%</p>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    } else {
                                        echo '<p>Aucun cours trouvé</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.php -->
            <?php include('partials/_footer.php'); ?>
        </div>


            <!-- partial -->
        </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>