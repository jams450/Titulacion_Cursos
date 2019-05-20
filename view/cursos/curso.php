<?php
    if (!isset($_GET)) {
        header("location: ../../index.php");
    } else {
        session_start();
        include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
        $curso=$conexion->query("select * from cursos where idcurso =". $_GET['id']);
        $contenido="";
        $encabezado="";
        if ($result=$curso->fetch_assoc()) {
            $informacion_curso=$result;
            if ($_GET['id']==1) {
                $contenido.='
              <iframe src="https://onedrive.live.com/embed?cid=85682E2576FD7F4D&amp;resid=85682E2576FD7F4D%21227&amp;authkey=AMgOWumHwdxx2Mw&amp;em=2&amp;wdAr=1.7777777777777777" width="1186px" height="691px" frameborder="0">Esto es un documento de <a target="_blank" href="https://office.com">Microsoft Office</a> incrustado con tecnología de <a target="_blank" href="https://office.com/webapps">Office Online</a>.</iframe>
            ';
            } elseif ($_GET['id']==2) {
                $contenido.='
              <iframe src="https://onedrive.live.com/embed?cid=85682E2576FD7F4D&amp;resid=85682E2576FD7F4D%21224&amp;authkey=AHb6VbdpbZ1Vk8c&amp;em=2&amp;wdAr=1.7777777777777777" width="1186px" height="691px" frameborder="0">Esto es un documento de <a target="_blank" href="https://office.com">Microsoft Office</a> incrustado con tecnología de <a target="_blank" href="https://office.com/webapps">Office Online</a>.</iframe>
            ';
            } elseif ($_GET['id']==6) {
                $contenido.='
              <<iframe src="https://onedrive.live.com/embed?cid=85682E2576FD7F4D&amp;resid=85682E2576FD7F4D%21225&amp;authkey=AO7e6lrEenybhLY&amp;em=2&amp;wdAr=1.7777777777777777" width="1186px" height="691px" frameborder="0">Esto es un documento de <a target="_blank" href="https://office.com">Microsoft Office</a> incrustado con tecnología de <a target="_blank" href="https://office.com/webapps">Office Online</a>.</iframe>
            ';
            }
        }
        $conexion->close();
    }
?>
     <!DOCTYPE html>

    <head>
      <?php include_once('../common/head.php'); ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <style media="screen">
      .tema {
        color: #d90429;
        float: left;
        font-size: 21px;
        margin-right: 10px;
      }
      #foto_portada{
        background-repeat:no-repeat;
        background-size: cover;
        background-image: url('/assets/images/cursos/<?=$informacion_curso['imagen_curso']?>');
      }
      </style>
    </head>

    <body>
      <div class="page-loading">
        <div class="loadery"></div>
      </div>
      <div class="theme-layout">

        <?php include_once('../common/menu.php'); ?>
		<section class="gray">
		  <div class="block remove-top">
			<div class="row">
			  <div class="col-md-12">
				<div class="list-detail-sec">
				  <div id="">
					<div class="row">
					  <div class="list-detail-box" id="foto_portada">
						<div class="list-detail-info">
						  <h3 id="nombre_actividad"><?=$informacion_curso['nombrecurso']?></h3>
              <p><?=$informacion_curso['resumen']?></P>
						  <br>
						</div>
					  </div>
					</div>
				  </div>
				</div>
		</section>

          <section>
            <div class="block gray">
                <div class="container">
					<div class="row">
						<div>
							<div class="checkout-sec">
                                    <form class="steps" method="post" id='newuser' name="newuser" action="/src/Controller/controlador_cursos.php" enctype="multipart/form-data">
                                        <div class="form-profile">
											<fieldset>
												       <?=$contenido?>
											</fieldset>
										</div>
									</form>
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
      <script type="text/javascript" src="assets/js/choosen.min.js"></script><!-- Nice Select -->
      <script type="text/javascript" src="src/js/examenes_cursos.js"></script><!-- Nice Select -->
    </body>

    </html>
