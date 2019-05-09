<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <?php include_once('../common/head.php'); ?>
    <title>Proximamente</title>
</head>
<body>
<div class="page-loading">
	<div class="loadery"></div>
</div>
<div class="theme-layout">
    <?php include_once('../common/menu.php'); ?>
	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="error-sec">
							<h2>Proximamente</h2>
							<span>Gastronomía</span>
							<p>Revisa las actividades que tenemos para ti <a href="/index.php" title="">Aquí</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <?php include_once('../common/footer.php'); ?>

    <?php include_once('../common/popups.php'); ?>
</div>
<!-- Script -->
<?php include_once('../common/script.php'); ?>
</body>
</html>