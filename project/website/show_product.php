<?php
include_once '../DB_CONNECTION.php';


?>


<!DOCTYPE html>
<html lang="en">
	<?php
    include_once 'partial/head.php';
    ?>
	<body>
    <?php
    include_once 'partial/header.php';
    include_once 'partial/nav.php';
    ?>

	


		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>
                    <?php
                    $category_name = $_GET['category_name'];         
                   
                    $query2 = "SELECT * from stores where CategoryName = '$category_name'";
                    $result2 = mysqli_query($connection, $query2);
                    while ($row=mysqli_fetch_assoc($result2)) {
                        echo ('<div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
							<img width="100px" height="100px" src="../upload/Images/'.$row['Image'].'">
								
							</div>
							<div class="product-body">
								<p class="product-category">Store Name</p>
								<h3 class="product-name"><a href="store_profile.php?id='.$row["id"].'">'.$row["name"].'</a></h3>								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								</div>
						</div>
					</div>');
						
                    }
                    // 
                    ?>

					
				
				</div>
			
			</div>
		
		</div>
	
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<?php
        include_once 'partial/footer.php';
        ?>
	</body>
</html>
