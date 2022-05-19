<?php
	include "../DB_CONNECTION.php";


	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=project2", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully";
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}


	$id = $_GET['id'];
	$id_Stor= $_GET['id'];
	
	if(isset($_GET['message']))  {
		$msg = $_GET['message'];
		echo '<script language="javascript">';
		echo 'alert("'.$msg.'")';
		echo '</script>';
	}

	$query3 = "select * from stores where id = $id";
	$result3 = mysqli_query($connection,$query3);
	
	$statment = $conn->query("SELECT avg(num_rating)  FROM rating where store_id =$id");
	$rating_total = $statment->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<?php include "partial/head.php"?>
<body>
<!-- HEADER -->
<?php include "partial/header.php"?>
<!-- /HEADER -->

<!-- NAVIGATION -->
<?php include "partial/nav.php"?>
<!-- /NAVIGATION -->

<!-- SECTION -->
<?php
	$row = mysqli_fetch_assoc($result3);
echo '<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Product main img -->
			<div class="col-md-5 col-md-push-2">
				<div id="product-main-img">
					<div class="product-preview">
						<img src="../upload/Images/' . $row['Image'] . '"   alt="">
					</div>

					<div class="product-preview">
						<img src="../upload/Images/' . $row['Image'] . '"   alt="">
					</div>

					<div class="product-preview">
						<img src="../upload/Images/' . $row['Image'] . '"   alt="">
					</div>

					<div class="product-preview">
						<img src="../upload/Images/' . $row['Image'] . '"   alt="">
					</div>
				</div>
			</div>
			<!-- /Product main img -->

			<!-- Product thumb imgs -->
			<div class="col-md-2  col-md-pull-5">

			</div>
			<!-- /Product thumb imgs -->

			<!-- Product details -->
			<div class="col-md-5">
				<div class="product-details">
					<h2 class="product-name">' . $row["name"] .'</h2>
					<div>
					
						
					</div><br><br>
					<p>'.$row['description'].'</p>

				</div>
			</div>
			<!-- /Product details -->

			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li><a data-toggle="tab" class="active" href="#tab3">Reviews</a></li>
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab3  -->
						<div id="tab1" class="tab-pane fade in active">
						<h1>You Can Rate Current Store from here</h1>
							<div class="row">
								<!-- Rating -->
								<div class="col-md-3">
									<div id="rating">
										<div class="rating-avg">
											<span>'.number_format((float)$rating_total, 1, '.', '').'</span>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
									</div>
								</div>
								<!-- /Rating -->

								<!-- Reviews -->
								
								<!-- /Reviews -->

								<!-- Review Form -->
								<div class="col-md-6">
								
									<div id="review-form">
										<form class="review-form" method="get" action="store_rating.php" disabled="disabled">
										<fieldset>
										<input type="hidden" name="id" value="'. $id_Stor .'">
											<div class="input-rating">
												<span>Your Rating: </span>
												<div class="stars">
													<input  id="star5" name="rating" value="5" type="radio" ><label for="star5"></label>
													<input  id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
													<input  id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
													<input  id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
													<input  id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
												</div>
											</div>
											<button type="submit" class="primary-btn" name="review">Submit</button>
									</fieldset>
										</form>
									</div>
								</div>
								<!-- /Review Form -->
							</div>
						</div>
						<!-- /tab3  -->
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>';
?>
<!-- /SECTION -->


<?php include "partial/footer.php"?>

</body>
</html>
