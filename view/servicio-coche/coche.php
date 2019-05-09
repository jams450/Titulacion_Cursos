<?php
session_start();
header("Location: no-disponible.php");
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
						<div class="col-md-6">
							<div class="inner-header">
								<h2>Compartir coche</h2>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
			
		<section>
			<div class="block no-padding">
				<div class="row no-gap">
					<div class="col-md-8">
						<div class="side-search-form">
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
								**/
							?>
							<div class="results-found">
								<div class="row">
									<div class="col-md-6">
										<div class="recent-places-box">
											<div class="recent-place-thumb">
												<a href="#" title=""><img src="http://placehold.it/245x209" alt="" /></a>
											</div>
											<div class="recent-place-detail">
												<div class="listing-box-title">
													<h3><a href="#" title="">Sunpro Technology inc</a></h3>
													<span>Los Angeles /  Sillicon Valley </span>
													<span>(416) 551-0589</span>
												</div>
												<span class="price-list">$149.90</span>
												<div class="listing-rate-share">
													<div class="rated-list">
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star-o"></b>
														<b class="la la-star-o"></b>
														<span>(13)</span>
													</div>
													<span><i class="la la-share-alt"></i><strong>Share</strong></span>
													<a href="#" title=""><i class="la la-heart-o"></i></a>
												</div>
											</div>
										</div>
										<div class="recent-places-box">
											<div class="recent-place-thumb">
												<a href="#" title=""><img src="http://placehold.it/245x209" alt="" /></a>
											</div>
											<div class="recent-place-detail">
												<div class="listing-box-title">
													<h3><a href="#" title="">Sunpro Technology inc</a></h3>
													<span>Los Angeles /  Sillicon Valley </span>
													<span>(416) 551-0589</span>
												</div>
												<span class="price-list">$149.90</span>
												<div class="listing-rate-share">
													<div class="rated-list">
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star-o"></b>
														<b class="la la-star-o"></b>
														<span>(13)</span>
													</div>
													<span><i class="la la-share-alt"></i><strong>Share</strong></span>
													<a href="#" title=""><i class="la la-heart-o"></i></a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="recent-places-box">
											<div class="recent-place-thumb">
												<a href="#" title=""><img src="http://placehold.it/245x209" alt="" /></a>
											</div>
											<div class="recent-place-detail">
												<div class="listing-box-title">
													<h3><a href="#" title="">Sunpro Technology inc</a></h3>
													<span>Los Angeles /  Sillicon Valley </span>
													<span>(416) 551-0589</span>
												</div>
												<span class="price-list">$149.90</span>
												<div class="listing-rate-share">
													<div class="rated-list">
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star-o"></b>
														<b class="la la-star-o"></b>
														<span>(13)</span>
													</div>
													<span><i class="la la-share-alt"></i><strong>Share</strong></span>
													<a href="#" title=""><i class="la la-heart-o"></i></a>
												</div>
											</div>
										</div>
										<div class="recent-places-box">
											<div class="recent-place-thumb">
												<a href="#" title=""><img src="http://placehold.it/245x209" alt="" /></a>
											</div>
											<div class="recent-place-detail">
												<div class="listing-box-title">
													<h3><a href="#" title="">Sunpro Technology inc</a></h3>
													<span>Los Angeles /  Sillicon Valley </span>
													<span>(416) 551-0589</span>
												</div>
												<span class="price-list">$149.90</span>
												<div class="listing-rate-share">
													<div class="rated-list">
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star-o"></b>
														<b class="la la-star-o"></b>
														<span>(13)</span>
													</div>
													<span><i class="la la-share-alt"></i><strong>Share</strong></span>
													<a href="#" title=""><i class="la la-heart-o"></i></a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="recent-places-box">
											<div class="recent-place-thumb">
												<a href="#" title=""><img src="http://placehold.it/245x209" alt="" /></a>
											</div>
											<div class="recent-place-detail">
												<div class="listing-box-title">
													<h3><a href="#" title="">Sunpro Technology inc</a></h3>
													<span>Los Angeles /  Sillicon Valley </span>
													<span>(416) 551-0589</span>
												</div>
												<span class="price-list">$149.90</span>
												<div class="listing-rate-share">
													<div class="rated-list">
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star-o"></b>
														<b class="la la-star-o"></b>
														<span>(13)</span>
													</div>
													<span><i class="la la-share-alt"></i><strong>Share</strong></span>
													<a href="#" title=""><i class="la la-heart-o"></i></a>
												</div>
											</div>
										</div>
										<div class="recent-places-box">
											<div class="recent-place-thumb">
												<a href="#" title=""><img src="http://placehold.it/245x209" alt="" /></a>
											</div>
											<div class="recent-place-detail">
												<div class="listing-box-title">
													<h3><a href="#" title="">Sunpro Technology inc</a></h3>
													<span>Los Angeles /  Sillicon Valley </span>
													<span>(416) 551-0589</span>
												</div>
												<span class="price-list">$149.90</span>
												<div class="listing-rate-share">
													<div class="rated-list">
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star-o"></b>
														<b class="la la-star-o"></b>
														<span>(13)</span>
													</div>
													<span><i class="la la-share-alt"></i><strong>Share</strong></span>
													<a href="#" title=""><i class="la la-heart-o"></i></a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="recent-places-box">
											<div class="recent-place-thumb">
												<a href="#" title=""><img src="http://placehold.it/245x209" alt="" /></a>
											</div>
											<div class="recent-place-detail">
												<div class="listing-box-title">
													<h3><a href="#" title="">Sunpro Technology inc</a></h3>
													<span>Los Angeles /  Sillicon Valley </span>
													<span>(416) 551-0589</span>
												</div>
												<span class="price-list">$149.90</span>
												<div class="listing-rate-share">
													<div class="rated-list">
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star-o"></b>
														<b class="la la-star-o"></b>
														<span>(13)</span>
													</div>
													<span><i class="la la-share-alt"></i><strong>Share</strong></span>
													<a href="#" title=""><i class="la la-heart-o"></i></a>
												</div>
											</div>
										</div>
										<div class="recent-places-box">
											<div class="recent-place-thumb">
												<a href="#" title=""><img src="http://placehold.it/245x209" alt="" /></a>
											</div>
											<div class="recent-place-detail">
												<div class="listing-box-title">
													<h3><a href="#" title="">Sunpro Technology inc</a></h3>
													<span>Los Angeles /  Sillicon Valley </span>
													<span>(416) 551-0589</span>
												</div>
												<span class="price-list">$149.90</span>
												<div class="listing-rate-share">
													<div class="rated-list">
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star"></b>
														<b class="la la-star-o"></b>
														<b class="la la-star-o"></b>
														<span>(13)</span>
													</div>
													<span><i class="la la-share-alt"></i><strong>Share</strong></span>
													<a href="#" title=""><i class="la la-heart-o"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div id="map-container" class="fixed-this">
							<div id="map_div">&nbsp;</div>
						</div>
					</div>
				</div>
			</div>
		</section>

			<?php include_once('../common/footer.php'); ?>

			<?php include_once('../common/popups.php'); ?>

		</div>

		<?php include_once('../common/script.php'); ?>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
		<script type="text/javascript" src="assets/js/maps2.js"></script><!-- Maps2 -->

	</body>
</html>