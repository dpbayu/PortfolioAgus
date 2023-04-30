<!-- PHP -->
<?php
require 'function.php';
$query = "SELECT * FROM tbl_user, tbl_admin";
$run = mysqli_query($db,$query);
$user = mysqli_fetch_array($run);

if (isset($_POST['submit'])) {
	require '';
}
?>
<!-- PHP -->
<!DOCTYPE html>
<html>

<!-- Head Start -->
<?php require 'partials/head.php' ?>
<!-- Head End -->

<body>
	<!-- Preloader Start -->
	<div id='preloader'>
		<div class='loader'></div>
		<div class='left'></div>
		<div class='right'></div>
	</div>
	<!-- Preloader End -->
	<!-- Main Content Start -->
	<div class='main-content'>
		<?php require 'partials/menu.php' ?>
		<!-- Section Start -->
		<div class='sections'>
			<!-- Main Section Start -->
			<?php require 'frontend/home.php' ?>
			<!-- Main Section End -->
			<!-- About Section Start -->
			<?php require 'frontend/about.php' ?>
			<!-- About Section End -->
			<!-- Resume Section Start -->
			<?php require 'frontend/resume.php' ?>
			<!-- Resume Section End -->
			<!-- Portfolio Section Start -->
			<?php require 'frontend/portfolio.php' ?>
			<!-- Portfolio Section Start -->
			<!-- Contact Section Start -->
			<?php require 'frontend/contact.php' ?>
			<!-- Contact Section End -->
		</div>
		<!-- Section End -->
	</div>
	<!-- Main Content End -->
	<?php require 'partials/footer.php' ?>
</body>

</html>