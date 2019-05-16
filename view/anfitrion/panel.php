<?php
    session_start();
    if (!isset($_SESSION['id_sesion_usuario'])) {
    }
?>
<!DOCTYPE html>
	<head>
        <?php include_once('../common/head.php'); ?>
        <style>
            header.on-top {
                position: relative;
			}
        </style>
	</head>
	<body>
		<div class="page-loading">
			<div class="loadery"></div>
		</div>
		<div class="theme-layout">
			<?php include_once('../common/menu.php'); ?>
			<section>
				<div class="block no-padding">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="inner-header">
									<h2>Panel de control</h2>
									<ul class="breadcrumbs">
										<li><a href="index.php" title="">Inicio</a></li>
										<li>Listas</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="block gray ">
					<div class="container">
						<div class="row">
							<div class="col-md-12 column">
								<div class="list-listings">
									<div class="row">
										<div class="col-md-12">
											<div class="recent-places-box list-style">
												<div class="recent-place-thumb">
													<a href="view/anfitrion/actividad/alta_actividad.php" title=""><img src="assets/images/home/aventura.jpg" class="img_list" alt="" /></a>
												</div>
												<div class="recent-place-detail">
													<div class="listing-box-title">
                                                        <h3><a href="#">Actividades</a></h3>
														<span>Crea una actividad para </span>
														<span>Ver tus actividades</span>
														<?php
                                                        /*
                                                            $query = "SELECT COUNT(*) FROM actividades_experiencias";

                                                            //echo $query;
                                                            $resTotal=$conection->query($query);
                                                            $i = 1;
                                                            while ($row = $resTotal->fetch_array(MYSQLI_BOTH)){
                                                                    echo "
                                                                        <p class='texto_list'>Total de actividades registradas:
                                                                            <span class='span_total'>".$row['COUNT(*)']."</span>
                                                                        </p>";
                                                            }
                                                            $i = 1;
                                                            */
                                                        ?>
													</div>
                                                    <div class="seccion-agregar">
                                                        <?php if ($_SESSION['is_anfitrion'] == 1) {
                                                            ?>
                                                        <a href="view/anfitrion/actividad/alta_actividad.php" title="" class="btn btn-success">Agregar</a>
                                                        <a href="view/anfitrion/preguntas-respuestas.php?idan=<?=$_SESSION['id_sesion_usuario']?>" title="" class="btn btn-primary">Preguntas & respuestas</a>
                                                        <a href="view/anfitrion/actividad/mis_actividades_registradas.php" title="" class="btn btn-primary">Mis Actividades registradas</a>
                                                        <?php
                                                        } ?>
                                                        <a href="view/anfitrion/actividad/mis_actividades_historial.php" title="" class="btn btn-primary">Historial de actividades</a>
                                                    </div>
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<div class="recent-places-box list-style">
												<div class="recent-place-thumb">
													<a href="view/anfitrion/alojamiento/alta_alojamiento.php" title=""><img src="assets/images/home/alojamiento.jpg" class="img_list" alt="" /></a>
												</div>
												<div class="recent-place-detail">
													<div class="listing-box-title">
														<h3><a href="#" title="">Alojamientos</a></h3>
														<span>Los Angeles /  Sillicon Valley </span>
														<span>Ver tus alojamientos</span>
													</div>
													<div class="seccion-agregar">
                                                        <?php if ($_SESSION['is_anfitrion'] == 1) {
                                                            ?>
                                                            <a href="view/anfitrion/alojamiento/alta_alojamiento.php" title="" class="btn btn-success">Agregar</a>
                                                        <?php
                                                        } ?>
                                                        <a href="view/anfitrion/actividad/mis_alojamientos.php" title="" class="btn btn-primary">Mis Alojamientos</a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="recent-places-box list-style">
												<div class="recent-place-thumb">
													<a href="view/anfitrion/coche/alta_coche.php" title=""><img src="assets/images/home/compartir_coche.jpg" class="img_list" alt="" /></a>
												</div>
												<div class="recent-place-detail">
													<div class="listing-box-title">
														<h3><a href="view/anfitrion/coche/alta_coche.php" title="">Compartir coche</a></h3>
														<span>Los Angeles /  Sillicon Valley </span>
														<span>Ver tus compartimientos de coche</span>
													</div>
													<div class="seccion-agregar">
                                                        <?php if ($_SESSION['is_anfitrion'] == 1) {
                                                            ?>
                                                        <a href="view/anfitrion/coche/alta_coche.php" title="" class="btn btn-success">Agregar</a>
                                                        <?php
                                                        } ?>
                                                        <a href="view/anfitrion/actividad/mis_asientos.php" title="" class="btn btn-primary">Mis asientos</a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="recent-places-box list-style">
												<div class="recent-place-thumb">
													<a href="view/anfitrion/gastronomia/alta_gastronomia.php" title=""><img src="assets/images/home/gastronomia.jpg" class="img_list" alt="" /></a>
												</div>
												<div class="recent-place-detail">
													<div class="listing-box-title">
														<h3><a href="view/anfitrion/gastronomia/alta_gastronomia.php" title="">Gastronomía</a></h3>
														<span>Los Angeles /  Sillicon Valley </span>
														<span>Ver tu gastronomía</span>
													</div>
													<div class="seccion-agregar">
                          <?php if ($_SESSION['is_anfitrion'] == 1) {
                                                            ?>
                          <a href="view/anfitrion/gastronomia/alta_gastronomia.php" title="" class="btn btn-success">Agregar</a>
                          <?php
                                                        } ?>
                          <a href="view/anfitrion/actividad/mi_gastronomia.php" title="" class="btn btn-primary">Mis gastronomia</a>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php include_once('../common/footer.php'); ?>

		</div>

        <?php include_once('../common/script.php'); ?>

        <script src="assets/js/index.js"></script>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
        <script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js'></script>

	</body>
</html>
