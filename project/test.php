<?php
	session_start();
	include_once "DB_CONNECTION.php";
    
	$success = false;
	$errors = [];
    
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$name = $_POST['p_name'];
		$details = $_POST['p_details'];
		$firstPrice = $_POST['first_price'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$category_id = $_POST['categories'];
		isset($_POST['status']) ? $active = $_POST['status'] : $active = 0;
		
		if (empty($_POST['p_name'])) {
			$errors['name'] = "Name is Required";
		}
		if (empty($_POST['p_details'])) {
			$errors['details'] = "Details is Required";
		}
		if (empty($_POST['first_price'])) {
			$errors['first_price'] = "First Price is Required";
		}
		if (empty($_POST['price'])) {
			$errors['price'] = "Price is Required";
		}
		if (empty($_POST['quantity'])) {
			$errors['quantity'] = "Quantity is Required";
		}
//		if (!isset($_Files['image'])) {
//			$errors['image'] = "Image is Required";
//		}
//		if (isset($_Files['image'])) {
//			if($_Files['image']['size'] > 500000) {
//				$errors['image'] = "Image is Large";
//			}
//			if($_Files['image']['type'] != "png") {
//				$errors['image'] = "Image must be png";
//			}
//		}

		if (!count($errors) > 0) {
			$date = date('Y-m-d h:i:s');
			
			$sql = "Insert into products(name,details, status, created_at, first_price, price, category_id,quantity)
                                        values ('$name','$details','$active','$date','$firstPrice','$price','$category_id','$quantity')";

			$result = mysqli_query($connection, $sql);
			$last_id = mysqli_insert_id($connection);//to get last insert id in this connection
			
			if ($result) {
				$file_count = count($_FILES['image']['name']);
				for($i = 0;$i < $file_count;$i++) {
					$fileName = $_FILES['image']['name'][$i];
					$fileSize = $_FILES['image']['size'][$i];
					$fileTempName = $_FILES['image']['tmp_name'][$i];
					$fileType = $_FILES['image']['type'][$i];
					$fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

					//to change file name with new name (uploaded time + random number) to avoid replacment files that maybe has the same name
					$fileNewName = strval(time() + rand(1, 10000)) . ".$fileExt";

					$uploadPath = 'uploads/images/' . $fileNewName;
					move_uploaded_file($fileTempName, $uploadPath);

					$query2 = "insert into product_files (product_id,image) values ('$last_id','$fileNewName')";
					$result2 = mysqli_query($connection,$query2);
					if($result2) {
						$success = true;
					}
				}
				
			} else {
				$errors['general_error'] = $connection->error;
			}
		}
	}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php
	include "partial/header.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns  menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern"
	  data-col="2-columns">
<!-- fixed-top-->
<?php
	include "partial/nav.php";
	include "partial/sidebar.php";
?>

<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row">
		</div>
		<div class="content-body">
			<section id="basic-form-layouts">
				<div class="row match-height">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title" id="basic-layout-form">Product Info</h4>
								<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
										<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
										<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
										<li><a data-action="close"><i class="ft-x"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body">
									<?php
										if(!empty($errors['general_error'])) {
											echo "<div class='alert alert-danger'>".$errors['general_error']."</div>";
										}elseif ($success) {
											echo "<div class='alert alert-success'>Product Added Successfully</div>";
										}
									?>
									<form class="form" method="POST" enctype="multipart/form-data" name="<?php echo $_SERVER['PHP_SELF']?>">
										<div class="form-body">
											<h4 class="form-section"><i class="ft-user"></i>Add New Product</h4>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="projectinput1">Product Name</label>
														<input type="text" id="projectinput1" class="form-control" placeholder="Product Name"
															   name="p_name">
														<span class="text-danger errors">
															<?php
																if(isset($errors['name'])) {
																	print_r($errors['name']);
																}
															?>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="projectinput2">Product Details</label>
														<input type="text" id="projectinput2" class="form-control" placeholder="Product Description"
															   name="p_details">
														<span class="text-danger errors">
															<?php
																if(isset($errors['details'])) {
																	print_r($errors['details']);
																}
															?>
														</span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="projectinput1">first_price</label>
														<input type="number" id="projectinput1" class="form-control" placeholder="first_price of product"
															   name="first_price">
														<span class="text-danger errors">
															<?php
																if(isset($errors['first_price'])) {
																	print_r($errors['first_price']);
																}
															?>
														</span>
													</div>
													
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="projectinput2">Price</label>
														<input type="number" id="projectinput2" class="form-control" placeholder="Price of Product"
															   name="price">
														<span class="text-danger errors">
															<?php
																if(isset($errors['price'])) {
																	print_r($errors['price']);
																}
															?>
														</span>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="projectinput1">Quantity</label>
														<input type="number" id="projectinput1" class="form-control" placeholder="Quantity of Product"
															   name="quantity">
														<span class="text-danger errors">
															<?php
																if(isset($errors['quantity'])) {
																	print_r($errors['quantity']);
																}
															?>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="projectinput2">Category</label>
														<select class="form-control" name="categories">
															<?php
																include "DB_CONNECTION.php";
																$query = "select * from categories";
																$result  = mysqli_query($connection,$query);
																while($row = mysqli_fetch_assoc($result)) {
																	echo '<option value=' . $row['id'] .'>' . $row['name'] . '</option>';
																}
															?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="projectinput3">Image</label>
														<input type="file" id="projectinput3" class="form-control"  name="image[]" multiple>
														<span class="text-danger errors">
															<?php
																if(isset($errors['image'])) {
																	print_r($errors['image']);
																}
															?>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="projectinput3">Status</label>
														<input type="checkbox" id="projectinput3" name="status" value="1" checked>
													</div>
												</div>
											</div>
										</div>
										<div class="form-actions">
											<button type="button" class="btn btn-warning mr-1">
												<i class="ft-x"></i> Cancel
											</button>
											<button type="submit" class="btn btn-primary">
												<i class="la la-check-square-o"></i> Save
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php
	include "partial/footer.php";
?>
</body>

</html>