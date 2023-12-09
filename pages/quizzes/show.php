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
			<!--<div class="main-panel">
				<div class="content-wrapper">

					<div class="card">
						<div class="container-xl">
							<div class="table-responsive">
								<div class="table-wrapper">
									<div class="table-title">
										<div class="row">
											<div class="col-sm-6">
												<h2>Manage <b>QUIZZES</b></h2>
											</div>
											<div class="col-sm-6">
												<a href="addquiz.php" class="btn btn-success" "><i class=" material-icons">&#xE147;</i> <span>Add New UTILISTEUR</span></a>
											</div>
										</div>
									</div>
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th>
													Quizzes
												</th>
												<th>
													Course Title
												</th>
												<th>
													Examine Now
												</th>
												<th>
													Score
												</th>
												<th>
													la Date
												</th>
												<th>
													Action
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
/*											$requet = "SELECT quizzes.id AS quiz_id , courses.title AS course_title,`score`,`dateHour`, quizzes.title AS quiz_title FROM `quizzes` INNER JOIN courses on quizzes.course_id = courses.id";
											$query = mysqli_query($connection, $requet);
											while ($value = mysqli_fetch_assoc($query)) {
												$id = $value['quiz_id'];
												$title1 = $value['course_title'];
												$title2 = $value['quiz_title'];
												$score = $value['score'];
												$dateHour = $value['dateHour'];
											*/?>
												<tr>
													<td><?php /*echo $title2; */?></td>
													<td><?php /*echo $title1; */?></td>
													<td>
														<a href='dwezquizz.php?id=<?php /*echo $id; */?>'>now</a>
													</td>
													<td>
														<p><?php /*echo $score; */?>%</p>
														<div class='progress'>
															<div class='progress-bar bg-success' role='progressbar' style='width:<?php /*echo $score; */?>%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>
														</div>
													</td>
													<td><?php /*echo $dateHour; */?></td>
													<td>
														<a href='delete.php?id=<?php /*echo $id; */?>' class='delete'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
														<a href='edit.php?id=<?php /*echo $id; */?>' class='edit'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
													</td>
												</tr>
											<?php
/*											}
											*/?>
										</tbody>
									</table>
									<div class="clearfix">
										<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
										<ul class="pagination">
											<li class="page-item disabled"><a href="#">Previous</a></li>
											<li class="page-item"><a href="#" class="page-link">1</a></li>
											<li class="page-item"><a href="#" class="page-link">2</a></li>
											<li class="page-item active"><a href="#" class="page-link">3</a></li>
											<li class="page-item"><a href="#" class="page-link">4</a></li>
											<li class="page-item"><a href="#" class="page-link">5</a></li>
											<li class="page-item"><a href="#" class="page-link">Next</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php /*include('../../partials/_footer.php'); */?>
				</div> -->
				<!-- main-panel ends -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-scroller">
                        <div class="container-fluid page-body-wrapper full-page-wrapper">
                            <div class="col-lg-12 mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <a href='addquiz.php' class="btn btn-primary mb-4 position-relative ">+ Ajouter un quiz</a>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Quiz</th>
                                                    <th>Cours</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $requet = "SELECT quizzes.id AS quiz_id , courses.title AS course_title,`dateHour`, quizzes.title AS quiz_title FROM `quizzes` INNER JOIN courses on quizzes.course_id = courses.id";
                                                    $query = mysqli_query($connection, $requet);
                                                    while ($value = mysqli_fetch_assoc($query)) {
                                                        $id = $value['quiz_id'];
                                                        $title1 = $value['course_title'];
                                                        $title2 = $value['quiz_title'];
                                                        $dateHour = $value['dateHour'];
                                                    ?>
                                                <tr>
                                                    <td><?php echo $title2; ?></td>
                                                    <td><?php echo $title1; ?></td>
                                                    <td><?php echo $dateHour; ?></td>
                                                    <td>
                                                        <a href='edit.php?id=<?php echo $id; ?>' class='edit'><i class='icon-md text-info mdi mdi-pencil-box'></i></a>
                                                        <a href='delete.php?id=<?php echo $id; ?>' class='delete'><i class='icon-md text-danger mdi mdi-delete'></i></a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
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

        </div>
			<!-- page-body-wrapper ends -->
		</div>

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