<?php
include('../../dbcon.php');
?>
<?php
if (isset($_GET['id'])) {
    $courseid = $_GET['id'];
    $query = "select * from courses where id = '$courseid'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
} else {
    header('location:show.php');
}

if (isset($_POST['title']) && $_POST['description'] && $_POST['content'] && $_POST['video_link']) {
    $title = $_POST['title'];
    $desciption = $_POST['description'];
    $content = $_POST['content'];
    $link = $_POST['video_link'];
    $query = "UPDATE `courses` SET `title` = '$title', `description` = '$desciption', `content` = '$content', `link` = '$link' WHERE `courses`.`id` = $courseid";
    if (mysqli_query($connection, $query)) {
        header('location:show.php');
    }
}
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

        /* .card {
            margin-bottom: 20px;
        } */

        .plus:hover {
            opacity: 100%;
        }

        /* .card:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        } */
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
                    <div class="card mb-3">
                        <div class="card-body ">
                            <h4 class="card-title">Page de modification de cours</h4>
                            <p class="card-description">
                                Entrer les informations du votre cours
                            </p>
                            <form method="post" class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputTitle">Titre du cours</label>
                                    <input type="text" value="<?php echo $row['title']; ?>" class="form-control" id="exampleInputTitle" placeholder="Titre du cours" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDescription">Description</label>
                                    <input type="text" class="form-control" value="<?php echo $row['description']; ?>" id="exampleInputDescription" placeholder="Description" name="description" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputVideoLink">Lien de vidéo</label>
                                    <input type="text" value="<?php echo $row['link']; ?>" class="form-control" id="exampleInputVideoLink" placeholder="Lien de vidéo" name="video_link" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputContent">Contenu</label>
                                    <textarea class="form-control" placeholder="Contenu" id="exampleInputContent" rows="14" name="content" required><?php echo $row['content']; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
                                <a class="btn btn-light" href="show.php">Annuler</a>
                            </form>
                        </div>
                        <!-- content-wrapper ends -->
                        <!-- partial:partials/_footer.php -->
                        <!-- partial -->
                    </div>
                    <?php include('../../partials/_footer.php'); ?>

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