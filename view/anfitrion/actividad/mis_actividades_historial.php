<?php
/**
 * Created by PhpStorm.
 * User: jmpg
 * Date: 5/11/18
 * Time: 12:34 PM
 */

session_start();
if (!isset($_SESSION['id_sesion_usuario'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<head>
    <?php include_once('../../common/head.php'); ?>
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
    <?php include_once('../../common/menu.php'); ?>
    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-header">
                            <h2>Panel de control</h2>
                            <ul class="breadcrumbs">
                                <li><a href="view/anfitrion/panel.php" title="">Panel</a></li>
                                <?php if ($_SESSION['is_anfitrion'] == 1){ ?>
                                <li><a href="view/anfitrion/actividad/mis_actividades_registradas.php">Mis actividades registradas</a></li>
                                <?php } ?>
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
                        <h2>Historial de actividades</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block no-padding">
            <div class="row no-gap">
                <div class="col-md-12">
                    <div class="side-search-form" style="display: none">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="input-style" placeholder="Keywords" />
                                </div>
                                <div class="col-md-4">
                                    <select data-placeholder="All Locations" class="chosen-select" tabindex="2">
                                        <option value="All Locations">Todos los lugares</option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select data-placeholder="All Categories" class="chosen-select" tabindex="2">
                                        <option value="All Categories">Todas la categorías</option>
                                        <option value="Restaurants">Restaurants</option>
                                        <option value="Foods">Foods</option>
                                        <option value="Hotels">Hotels</option>
                                        <option value="Bars">Bars</option>
                                        <option value="PlayLands">PlayLands</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="filter-by-tags">
                                        <h3>Filter by tag:</h3>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>
                                                    <input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value1">
                                                    <label for="styled-checkbox-2">Aceptan tarjetas</label>
                                                </p>
                                                <p>
                                                    <input class="styled-checkbox" id="styled-checkbox-3" type="checkbox" value="value1">
                                                    <label for="styled-checkbox-3">Bike Parking</label>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    <input class="styled-checkbox" id="styled-checkbox-4" type="checkbox" value="value1">
                                                    <label for="styled-checkbox-4">Street Parking</label>
                                                </p>
                                                <p>
                                                    <input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="value1">
                                                    <label for="styled-checkbox-5">Cupones</label>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    <input class="styled-checkbox" id="styled-checkbox-6" type="checkbox" value="value1">
                                                    <label for="styled-checkbox-6">Alcohol</label>
                                                </p>
                                                <p>
                                                    <input class="styled-checkbox" id="styled-checkbox-7" type="checkbox" value="value1">
                                                    <label for="styled-checkbox-7">Pets Friendly</label>
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                    <input class="styled-checkbox" id="styled-checkbox-8" type="checkbox" value="value1">
                                                    <label for="styled-checkbox-8">Reservaciones</label>
                                                </p>
                                                <p>
                                                    <input class="styled-checkbox" id="styled-checkbox-9" type="checkbox" value="value1">
                                                    <label for="styled-checkbox-9">Good for Kids</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit">Update Listings</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="results-sec">
                        <?php
                        /**
                        $query = "SELECT COUNT(*) FROM actividades_experiencias";

                        //echo $query;
                        $resTotal=$conection->query($query);
                        $i = 1;
                        while ($row = $resTotal->fetch_array(MYSQLI_BOTH)){
                        //echo $row['COUNT(*)'];
                        echo "<span class=''>".$row['COUNT(*)']." registrados</span>";
                        }
                        $i = 1;
                         */
                        ?>
                        <div class="results-found">
                            <div class="row" id="resultadosActividades">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('../../common/footer.php'); ?>

</div>
<?php include_once('../../common/script.php'); ?>

<script src="assets/js/index.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js'></script>

<script>
    $( document ).ready(function(){
        $.ajax({
            data: {
                "listaActividadesHistorial" : "listaActividadesHistorial",
                "filter" : {
                    "usuario.id_usuario" : <?= $_SESSION['id_sesion_usuario'] ?>
                }
            },
            type: "POST",
            dataType: "json",
            url: "src/Controller/actividadController.php"
        })
            .done(function( data ) {
                for (item in data.actividades.data) {
                    var divMain = $("<div>").attr("class", "col-md-6");
                    var divFirst = $("<div>").attr("class", "recent-places-box");
                    var divThumb = $("<div>").attr("class", "recent-place-thumb");
                    var aImageParent = $("<a>").attr("href", "view/anfitrion/actividad/detalle_historial.php?ida="+data.actividades.data[item].idActividad+"&iddp="+data.actividades.data[item].id_datos_precio_actividad+"&idpa="+data.actividades.data[item].id_precios_actividad+"&idr="+data.actividades.data[item].id_reserva_actividades).attr("title", data.actividades.data[item].tituloActividad);
                    var imgagePortada = $("<img>").attr("src", data.actividades.data[item].srcImagenportada+data.actividades.data[item].nombreImagenportada).attr("alt", "").attr("width","245px").attr("height","209px").attr("class","img-responsive img-thumbnail");
                    var divDetail = $("<div>").attr("class", "recent-place-detail");
                    var divTitle = $("<div>").attr("class", "listing-box-title");
                    var h3 = $("<h3>");
                    var asubH3 = $("<a>").attr("href", "view/anfitrion/actividad/detalle_historial.php?ida="+data.actividades.data[item].idActividad+"&iddp="+data.actividades.data[item].id_datos_precio_actividad+"&idpa="+data.actividades.data[item].id_precios_actividad+"&idr="+data.actividades.data[item].id_reserva_actividades).attr("title", data.actividades.data[item].tituloActividad); asubH3.text(data.actividades.data[item].tituloActividad);
                    var spanCity = $("<span>"); spanCity.text("pagado"); //city
                    var spanTelefeono = $("<span>"); spanTelefeono.text(data.actividades.data[item].usuarioCelular); //telefono
                    var spanEmail = $("<span>"); spanEmail.text();//mail
                    var spanPrice = $("<span>"); spanPrice.text(data.actividades.data[item].precio_persona);
                    var divRate = $("<div>").attr("class", "listing-rate-share");
                    var divList = $("<div>").attr("class", "rated-list");
                    var bStart1 = $("<b>").attr("class", "la la-star");
                    var bStart2 = $("<b>").attr("class", "la la-star");
                    var bStart3 = $("<b>").attr("class", "la la-star");
                    var bStart4 = $("<b>").attr("class", "la la-star-o");
                    var bStart5 = $("<b>").attr("class", "la la-star-o");
                    var spanTotal = $("<span>");
                    var spanEmpty = $("<span>");
                    //var iShare = $("<span>").attr("class", "la la-share-alt");
                    //var strongSubShare = $("<strong>"); strongSubShare.text("Share");
                    //var aHeart = $("<a>").attr("href", "#").attr("title", "");
                    //var iHeart = $("<i>").attr("class", "la la-heart-o");
                    var socialShare = '<span><i class="la la-share-alt"></i></span><a href="#" title=""><i class="la la-heart-o"></i></a>';

                    divMain.append(divFirst);
                    divFirst.append(divThumb);
                    divThumb.append(aImageParent);
                    aImageParent.append(imgagePortada);
                    divFirst.append(divDetail);
                    divDetail.append(divTitle);
                    divTitle.append(h3);
                    h3.append(asubH3);
                    divTitle.append(spanCity);
                    //divTitle.append(spanTelefeono);
                    divTitle.append(spanEmail);
                    divDetail.append(spanPrice);
                    divDetail.append(divRate);
                    divRate.append(divList);
                    divList.append(bStart1);
                    divList.append(bStart2);
                    divList.append(bStart3);
                    divList.append(bStart4);
                    divList.append(bStart5);
                    divList.append(spanTotal);
                    divRate.append(spanEmpty);
                    divRate.append(socialShare);
                    //spanEmpty.append(iShare);
                    //iShare.append(strongSubShare);
                    //divRate.append(aHeart);
                    //aHeart.append(iHeart);
                    $("#resultadosActividades").append(divMain);
                    //console.log(item);
                }

                //console.log(data);
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( "La solicitud a fallado: " +  textStatus);
                }
            });
    });

</script>
</body>
</html>