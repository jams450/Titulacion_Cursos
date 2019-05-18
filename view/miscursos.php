<?php
   session_start();
   $_SESSION['id_sesion_usuario']=1;
    if (!isset($_SESSION['id_sesion_usuario'])) {
        header("location: ../../index.php");
    }
    $error = isset($_GET['error']) ? 'block' : 'none';
?>

<!DOCTYPE html>
	<head>
        <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/view/common/head.php");?>

        <link rel="stylesheet" href="assets/css/style_steps.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap-datepicker3.standalone.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/wickedpicker.min.css">
        <style>
            header.on-top {
                position: relative;
            }

            #progressbar li {
                width: 100%!important;
            }

            input#file-2 {
                margin-top: 0;
                padding: 0;
            }

            output {
                display: inline;
            }
            img.usuario_imagen {
                width: 120px;
                height: auto;
            }

            .inputfile {
                visibility: hidden;
                width: 0;
            }
            input#file-1 {
                margin-top: 0;
                padding: 0;
            }
            .error1 + label {
                background: #f4f4f4 none repeat scroll 0 0;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                -ms-border-radius: 3px;
                -o-border-radius: 3px;
                border-radius: 3px;
                color: #8d99ae;
                display: inline-block;
                font-family: Roboto;
                font-weight: 100;
                font-size: 14px;
                margin-top: 76px;
                padding: 6px 20px;
                vertical-align: bottom;
                -webkit-transition: all 0.4s ease 0s;
                -moz-transition: all 0.4s ease 0s;
                -ms-transition: all 0.4s ease 0s;
                -o-transition: all 0.4s ease 0s;
                transition: all 0.4s ease 0s;
            }
            .error2 + label {
                background: #f4f4f4 none repeat scroll 0 0;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                -ms-border-radius: 3px;
                -o-border-radius: 3px;
                border-radius: 3px;
                color: #8d99ae;
                display: inline-block;
                font-family: Roboto;
                font-weight: 100;
                font-size: 14px;
                padding: 6px 20px;
                vertical-align: bottom;
                -webkit-transition: all 0.4s ease 0s;
                -moz-transition: all 0.4s ease 0s;
                -ms-transition: all 0.4s ease 0s;
                -o-transition: all 0.4s ease 0s;
                transition: all 0.4s ease 0s;
            }

            .error1:focus + label,
            .error1.has-focus + label,
            .error1 + label:hover {
                background-color: #d90429;
                color:#fff;
                text-decoration: none;
                cursor: pointer;
            }

            .error2:focus + label,
            .error2.has-focus + label,
            .error2 + label:hover {
                background-color: #d90429;
                color:#fff;
                text-decoration: none;
                cursor: pointer;
            }
            .hide_input{
                display: none!important;
            }
            /*Style for radio buttons*/
            .container_radio {
                display: block;
                position: relative;
                padding-left: 35px;
                margin-top: 30px;
                margin-bottom: 12px;
                cursor: pointer;
                font-size: 14px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            .container_radio input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }
            .checkmark {
                position: absolute;
                top: 0;
                left: 0;
                height: 25px;
                width: 25px;
                background-color: #eee;
                border-radius: 50%;
            }
            .container_radio:hover input ~ .checkmark {
                background-color: #ccc;
            }
            .container_radio input:checked ~ .checkmark {
                background-color: #2196F3;
            }
            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
            }
            .container_radio input:checked ~ .checkmark:after {
                display: block;
            }
            .container_radio .checkmark:after {
                top: 9px;
                left: 9px;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: white;
            }
            /* Arreglo para Select */
            .chosen-select {
                margin-top: 30px;
            }
            .fileUl{
                list-style: none;
            }
            .fileData{}
            .uploaded > p{
                list-style: none;
                color: forestgreen;
            }

        </style>
	</head>
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>
	<body>
		<div class="page-loading">
			<div class="loadery"></div>
		</div>
		<div class="theme-layout">

        <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/view/common/menu.php");?>

        			<section>
        				<div class="block no-padding">
        					<div class="container">
        						<div class="row">
        							<div class="col-md-12">
        								<div class="inner-header">
        									<h2>Mis Cursos</h2>
        									<ul class="breadcrumbs">
        										<li><a href="index.php" title="">Inicio</a></li>
        										<li>Mis Cursos</li>
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
        					<div class="col-md-8 column col-md-offset-2">
        						<div class="blog-sec">
        							<div class="row" id="miscursos">
        								        <!-- AQUI DEBEN ENTRAR LOS CURSOS-->
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</section>

        <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/view/common/footer.php");?>
        <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/view/common/popups.php");?>

		</div>

        <?php include_once($_SERVER["DOCUMENT_ROOT"] . "/view/common/script.php");?>

        <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datepicker.es.min.js"></script>
        <script type="text/javascript" src="assets/js/wickedpicker.min.js"></script>
        <script type="text/javascript" src="assets/js/choosen.min.js"></script>
        <script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
        <script type="text/javascript" src="src/js/alta_usuario.js"></script>

        <script>
          $(document).ready(function() {
            $.ajax({
              url: '/src/Controller/controlador_miscursos.php',
              type: 'POST',
              dataType: 'json',
              data: {operacion: 'get'}
            })
            .done(function(e) {
              var cursos=e;
              for (var i = 0; i < cursos.length; i++) {
                $('#miscursos').append(cursos[i]);
              }
            })

          });

        </script>
	</body>
</html>
