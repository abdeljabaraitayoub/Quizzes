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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="../../images/favicon.ico" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap.scc">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/main.css">
	<style>
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: white;
			color: black;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		checkbox table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		img {
			width: 2px;
		}
	</style>

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
											$requet = "SELECT quizzes.id AS quiz_id , courses.title AS course_title,`score`,`dateHour`, quizzes.title AS quiz_title FROM `quizzes` INNER JOIN courses on quizzes.course_id = courses.id";
											$query = mysqli_query($connection, $requet);
											while ($value = mysqli_fetch_assoc($query)) {
												$id = $value['quiz_id'];
												$title1 = $value['course_title'];
												$title2 = $value['quiz_title'];
												$score = $value['score'];
												$dateHour = $value['dateHour'];
											?>
												<tr>
													<td><?php echo $title2; ?></td>
													<td><?php echo $title1; ?></td>
													<td>
														<a href='dwezquizz.php?id=<?php echo $id; ?>'>now</a>
													</td>
													<td>
														<p><?php echo $score; ?>%</p>
														<div class='progress'>
															<div class='progress-bar bg-success' role='progressbar' style='width:<?php echo $score; ?>%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>
														</div>
													</td>
													<td><?php echo $dateHour; ?></td>
													<td>
														<a href='delete.php?id=<?php echo $id; ?>' class='delete'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
														<a href='edit.php?id=<?php echo $id; ?>' class='edit'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
													</td>
												</tr>
											<?php
											}
											?>
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
					<!-- content-wrapper ends -->
					<!-- partial:partials/_footer.php -->
					<?php include('../../partials/_footer.php'); ?>
					<!-- partial -->
				</div>
				<!-- main-panel ends -->
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