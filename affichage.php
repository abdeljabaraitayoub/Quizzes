<!DOCTYPE html>
<html lang="en">

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
    <title></title>
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
                    <div class="container-scroller">
                        <div class="container-fluid page-body-wrapper full-page-wrapper">
                            <div class="col-lg-12 mx-auto">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h1>UTILISATEUR</h1>
                                        <a href='insertion.php?id=$id' class="btn btn-primary mb-4 position-relative ">Ajouter</a>
                                    </div>
                                    <table class="table" border=1>
                                        <th class="bg-primary text-white">id</th>
                                        <th class="bg-primary text-white">Nom</th>
                                        <th class="bg-primary text-white">Email</th>
                                        <th class="bg-primary text-white">Role</th>
                                        <th class="bg-primary text-white">Action</th>
                                        <th class="bg-primary text-white">Action</th>
                                        <?php
                                        include 'dbcon.php';
                                        $requete = "SELECT * FROM users";
                                        $query = mysqli_query($connection, $requete);
                                        while ($rows = mysqli_fetch_assoc($query)) {
                                            $id = $rows['id'];
                                            echo "<tr>";
                                            echo "<td>" . $rows['id'] . "</td>";
                                            echo "<td>" . $rows['username'] . "</td>";
                                            echo "<td>" . $rows['email'] . "</td>";
                                            echo "<td>" . $rows['role'] . "</td>";
                                            echo "<td><a href='delete.php?id=$id'>Supprimer</a></td>";
                                            echo "<td><a href='insertmodification.php?id=$id'>Modifier</a></td>";
                                            echo "<tr>";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<footer class="footer">
    <div class="text-center">
        🔗 Class Aziz Resources Hub
    </div>
</footer>


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
