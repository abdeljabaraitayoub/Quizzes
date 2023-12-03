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

<body>
    <?php
            include 'dbcon.php';
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $requete="SELECT *FROM users WHERE id='$id'";
                $query=mysqli_query($connection,$requete);
                $rows=mysqli_fetch_assoc($query);
                $id=$rows['id'];
                $username=$rows['username'];
                $password=$rows['password'];
                $email=$rows['email'];
                $role=$rows['role'];
            }
    ?>
    <?php
        include 'dbcon.php'; 
        $query = "SELECT * FROM users";
        $quercon = mysqli_query($connection, $query);
    ?>
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
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 h-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo text-center">
                            <img src="images/youcode.png" alt="logo">
                            <form class="pt-3" action="modifier.php?<?php if(isset($_GET['id'])) {echo "id=update";}?>" method="POST">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="username" value="<?php if(isset($_GET['id'])){echo $username;} ?>" placeholder="Username" required>
                                </div>
                                    <input type="hidden"  name="id"  value="<?php echo $_GET['id'];?>">
                                <div class="form-group">   
                                    <input type="email" class="form-control form-control-lg" name="email" value="<?php if(isset($_GET['id'])){echo $email;} ?>" placeholder="Email" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password"  placeholder="Password" value="<?php if(isset($_GET['id'])){echo $password;} ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <select name="role" class="form-control form-control-lg" value="<?php if(isset($_GET['id'])){echo $role;} ?>" required>
                                        <option>Student</option>
                                        <option>Admin</option>
                                    </select>
                                </div>
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Modifier</button>
                            </form>
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
