<?php
    session_start();
?>
<!DOCTYPE html>

<head>
  <?php include_once('../common/head.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
                      <h3 id="nombre_actividad">Nombre</h3>
                      <br>
                      <div class="rated-list">
                        <b class="la la-star"></b>
                        <b class="la la-star"></b>
                        <b class="la la-star"></b>
                        <b class="la la-star-o"></b>
                        <b class="la la-star-o"></b>
                        <span>(###)</span>
                      </div>


                      <button class="write-review" id="reservar" type="submit">Inscribirse</button>

                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="link-bars">
                <div class="container">
                  <a href="#description" title="">Descripcion</a>
                  <a href="#meals" title="">Temas</a>
                  <a href="#hours" title="">Reviews</a>
                </div>
              </div>
              <div class="mian-listing-detail gray">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 column">
                      <div class="description-detail-box" id="description">
                        <h3 class="mini-title">DESCRIPTION</h3>
                        <div class="detail-descriptions">
                          <p>Curabitur lacinia erat quis nisi mollis, non pulvinar diam auctor. Integer ornare lobortis tristique. Vestibulum congue eleifend sapien, ac tristique nisi dapibus quis. Vivamus ligula erat, convallis nec leo vel, eleifend
                            imperdiet lacus. Maecenas a euismod augue. Nam eu neque in velit fermentum finibus. Morbi sed lacus in odio ullamcorper facilisis. Vivamus maximus fringilla nisi, eget tristique elit mollis sit amet.</p>
                          <p>Mauris in enim sit amet erat consequat vulputate. Donec ut justo nec est congue cursus sit amet aliquet lorem. In at eros id nisi sollicitudin consectetur at vel risus. Integer elit sapien, posuere nec augue non, tempus
                            molestie est. Ut quis congue dui. Quisque finibus rhoncus nulla, nec consectetur nibh finibus sit amet. Duis eget justo venenatis nisi interdum facilisis non eget purus.</p>
                        </div>
                      </div>

                      <div class="description-detail-box" id="description">
                        <h3 class="mini-title">Temas</h3>
                        <div class="detail-descriptions">
                          <div class="amenities-sec">
                            <span><i class="la la-check-circle"></i>Wi-Fi</span>
                            <span><i class="la la-check-circle"></i>Daily Specials</span>
                            <span><i class="la la-check-circle"></i>Take-out</span>
                            <span><i class="la la-check-circle"></i>Free Parking</span>
                            <span><i class="la la-check-circle"></i>Reservations</span>
                            <span><i class="la la-check-circle"></i>Serves Alcoho</span>
                            <span><i class="la la-check-circle"></i>Credit Card Payment</span>
                            <span><i class="la la-check-circle"></i>Wheelchair Accessible</span>
                            <span><i class="la la-check-circle"></i>Online Ordering</span>
                          </div>
                        </div>
                      </div>

                      <div class="display-review-box" id="review">
                        <h3 class="mini-title">revıew</h3>
                        <div class="review-list-sec">
                          <ul>
                            <li>
                              <div class="review-list">
                                <div class="reviewer-info">
                                  <h3><a href="#" title="">Jamies Giroux</a></h3>
                                  <span>7 months ago</span>
                                  <p>Donec nec tristique sapien. Aliquam ante felis, sagittis sodales diam sollicitudin, dapibus semper turpis</p>
                                </div>
                                <div class="reviewer-stars">
                                  <b class="la la-star"></b>
                                  <b class="la la-star"></b>
                                  <b class="la la-star"></b>
                                  <b class="la la-star"></b>
                                  <b class="la la-star"></b>
                                </div>
                              </div>
                            </li>
                          </ul>
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

    <?php include_once('../common/popups.php'); ?>

  </div>

  <!-- Script -->
  <?php include_once('../common/script.php'); ?>
  <script type="text/javascript" src="assets/js/choosen.min.js"></script><!-- Nice Select -->
  <script type="text/javascript" src="assets/js/detalle_curso.js"></script><!-- Nice Select -->
</body>

</html>
