<?php
	include "../DB_CONNECTION.php";
	$search_keyword = $_GET['search_word'];

	$sql2 = "select * from stores where name like '%$search_keyword%'";
    $sql = "select * from stores where name like '%$search_keyword%'";
    $result4 = mysqli_query($connection,$sql);
    $result2 = mysqli_query($connection,$sql2);

?>

<!DOCTYPE html>
<html lang="en">
<?php include "partial/head.php"?>
<body>
<?php include "partial/header.php"?>

<?php include "partial/nav.php"?>

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Stores</h3>
                </div>
            </div>
            
            <?php
                if($result4->num_rows > 0) {
                    while ($row=mysqli_fetch_assoc($result4)) {
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
                }else {
                    echo "<br><br><br><br><br><br><div class='section-title text-center'>
                    <h3 class='title'>No Stores matces search keyword</h3>
                </div>";
                }
            ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

<?php include "partial/footer.php"?>
</body>
</html>
