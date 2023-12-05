<?php
include('../../dbcon.php');

if (isset($_GET['id'])) {
    $courseId = $_GET['id'];
    $query = "select * from courses where id = '$courseId'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.ico" />
</head>


<body onscroll="progress()">
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
                    <div class="card col-md-8 mx-auto">
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
                            <div class="card-footer d-flex justify-content-end">
                                <button type="button" class="btn btn-inverse-success btn-md mr-2">Passer le quiz</button>
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

                <script>
                    var courseId = <?php echo json_encode($courseId); ?>;

                    function saveProgress(courseId, progress) {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "save_progress.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function() {
                            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                                console.log(this.responseText);
                            }
                        }
                        xhr.send("course_id=" + courseId + "&progress=" + progress);
                    }

                    function progress(){
                        var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
                        var totalHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                        var scrolledPercentage = (scrollPosition / totalHeight) * 100;

                        saveProgress(courseId, Math.round(scrolledPercentage));
                    }

                    function retrieveProgressAndScroll(courseId) {
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "retrieve_progress.php?course_id=" + courseId, true);
                        xhr.onreadystatechange = function() {
                            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                                var progress = parseInt(this.responseText);
                                if (!isNaN(progress)) {
                                    var totalHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                                    var scrollToPosition = (progress / 100) * totalHeight;
                                    window.scrollTo(0, scrollToPosition);
                                }
                            }
                        }
                        xhr.send();
                    }

                    window.onload = function() {
                        retrieveProgressAndScroll(courseId);
                    };

                </script>

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