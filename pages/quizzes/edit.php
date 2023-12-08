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
		select {
			opacity: 1;
			/* Reset opacity to default */
			/* Add other reset styles if needed */
		}

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

					<form method="post" action="checking.php" class="forms-sample">

						<div class="card mb-3">


							<div class="card-body ">
								<h4 class="card-title">Page de creation de quizz</h4>
								<p class="card-description">
									Entrer les detaille de votre quizz
								</p>
								<div class="form-group">
									<label for="exampleInputTitle">Titre du quizz</label>
									<input type="text" class="form-control" id="exampleInputTitle" placeholder="Titre du quizz" name="title" required>
								</div>
								<div class="form-group">
									<label>Course name</label>

									<select class='form-control' name='courseId' required>
										<?php
										$r = "SELECT * FROM courses";
										$query = mysqli_query($connection, $r);

										while ($value = mysqli_fetch_assoc($query)) {
											echo '<option value=' . $value['id'] . ' >' . $value['title'] . '</option>';
										}
										?>
									</select>

								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body ">
								<h4 class="card-title">Page de creation des question</h4>
								<p class="card-description">
									Entrer votre questiones
								</p>
								<!-- Question 0 -->
								<div>
									<div class="form-group">
										<label for="exampleInputTitle">Question 1</label>
										<input type="text" class="form-control" id="exampleInputTitle" placeholder="Titre du quizz" name="question0" required>
									</div>
									<div class="form-group">
										<label for="exampleInputTitle">Reponses</label>
										<div class="d-flex">
											<input type="text" class="form-control text-success mr-5" id="exampleInputTitle" placeholder="reponse correct" name="response0">
											<input type="text" class="form-control text-danger mr-5" id="exampleInputTitle" placeholder="reponse faux" name="response1">
											<input type="text" class="form-control text-danger" id="exampleInputTitle" placeholder="reponse faux" name="response2">
										</div>
									</div>
								</div>

								<!-- Question 1 -->
								<div>
									<div class="form-group">
										<label for="exampleInputTitle">Question 2</label>
										<input type="text" class="form-control" id="exampleInputTitle" placeholder="Titre du quizz" name="question1" required>
									</div>
									<div class="form-group">
										<label for="exampleInputTitle">Reponses</label>
										<div class="d-flex">
											<input type="text" class="form-control text-success mr-5" id="exampleInputTitle" placeholder="reponse correct" name="response3">
											<input type="text" class="form-control text-danger mr-5" id="exampleInputTitle" placeholder="reponse faux" name="response4">
											<input type="text" class="form-control text-danger" id="exampleInputTitle" placeholder="reponse faux" name="response5">
										</div>
									</div>
								</div>

								<!-- Question 2 -->
								<div>
									<div class="form-group">
										<label for="exampleInputTitle">Question 3</label>
										<input type="text" class="form-control" id="exampleInputTitle" placeholder="Titre du quizz" name="question2" required>
									</div>
									<div class="form-group">
										<label for="exampleInputTitle">Reponses</label>
										<div class="d-flex">
											<input type="text" class="form-control text-success mr-5" id="exampleInputTitle" placeholder="reponse correct" name="response6">
											<input type="text" class="form-control text-danger mr-5" id="exampleInputTitle" placeholder="reponse faux" name="response7">
											<input type="text" class="form-control text-danger" id="exampleInputTitle" placeholder="reponse faux" name="response8">
										</div>
									</div>
								</div>

								<!-- Question 3 -->
								<div>
									<div class="form-group">
										<label for="exampleInputTitle">Question 4</label>
										<input type="text" class="form-control" id="exampleInputTitle" placeholder="Titre du quizz" name="question3" required>
									</div>
									<div class="form-group">
										<label for="exampleInputTitle">Reponses</label>
										<div class="d-flex">
											<input type="text" class="form-control text-success mr-5" id="exampleInputTitle" placeholder="reponse correct" name="response9">
											<input type="text" class="form-control text-danger mr-5" id="exampleInputTitle" placeholder="reponse faux" name="response10">
											<input type="text" class="form-control text-danger" id="exampleInputTitle" placeholder="reponse faux" name="response11">
										</div>
									</div>
								</div>

								<!-- Question 4 -->
								<div>
									<div class="form-group">
										<label for="exampleInputTitle">Question 5</label>
										<input type="text" class="form-control" id="exampleInputTitle" placeholder="Titre du quizz" name="question4" required>
									</div>
									<div class="form-group">
										<label for="exampleInputTitle">Reponses</label>
										<div class="d-flex">
											<input type="text" class="form-control text-success mr-5" id="exampleInputTitle" placeholder="reponse correct" name="response12">
											<input type="text" class="form-control text-danger mr-5" id="exampleInputTitle" placeholder="reponse faux" name="response13">
											<input type="text" class="form-control text-danger" id="exampleInputTitle" placeholder="reponse faux" name="response14">
										</div>
									</div>
								</div>

								<div>
									<button type="submit" class="btn btn-primary mr-2">Soumettre</button>
									<a class="btn btn-light" href="show.php">Annuler</a>
								</div>
							</div>
						</div>
					</form>

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