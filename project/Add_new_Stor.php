<?php
    include_once 'DB_CONNECTION.php';

    $errors=[];
    $success=false;
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        
        $name=$_POST['S-name'];
        $description=$_POST['S-description'];
        $Adress=$_POST['S-Adress'];
       $Category=$_POST['S-Category'];
        $phone=$_POST['S-phone'];
      
        isset($_POST['status']) ? $status=$_POST['status'] : $status=0;
        if(empty($name)){
            $errors['name-error']="Name Is Required Please Fill It";
        }
        if(empty($description)){
            $errors['description-error']="Description Is Required Please Fill It";
        }
        if(empty($Adress)){
            $errors['Adress-error']="Adress Is Required Please Fill It";
        }
       
       
        if(empty($phone)){
            $errors['phone-error']="phone Is Required Please Fill It";
        }
        if(empty($Category)){
            $errors['Category-error']="Category Is Required Please Fill It";
        }
        	

        if (count($errors) >0){
            $errors['general_error']="Please Fix All Error";
        }else{
         
            $fileName = $_FILES['image']['name'][0];
            $fileTempName = $_FILES['image']['tmp_name'][0];
            $fileType = $_FILES['image']['type'][0];
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
               $fileNewName = strval(time() + rand(1, 10000)) . ".$fileExt";

            $uploadPath = 'upload/Images/'. $fileNewName ;
            move_uploaded_file($fileTempName, $uploadPath);
            $query="INSERT INTO stores
                (name,description,Image,Adress,phone,categoryName)
                VALUES('$name','$description', '$fileNewName','$Adress','$phone','$Category')";
            $result=mysqli_query($connection,$query);
            if($result){
                $errors=[];
                $success=true;
                header('location:Show_All_Stor.php');
            }else{
                $errors['general_error']=mysqli_error($connection);
            }
        }


    }
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php
    include "parts/header.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern"
      data-col="2-columns">
<!-- fixed-top-->
<?php
    include "parts/nav.php";
    include "parts/sidebar.php";
?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
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
                                <h4 class="card-title" id="basic-layout-form">Stror Info</h4>
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
                                    if (!empty($errors['general_error'])){
                                        echo "<div class='alert alert-danger'>".$errors['general_error']."</div>";
                                    }elseif ($success)
                                        echo "<div class='alert alert-success'>Stror Added Successfully</div>";



                                        
                                    ?>



                                    <form class="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Add New Stror</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Stror Name</label>
                                                        <input type="text" id="projectinput1" class="form-control" placeholder="Stror Name"
                                                               name="S-name">

                                                        <?php
                                                            if (!empty($errors['name-error'])){
                                                                echo "<span class='text-danger'>".$errors['name-error']."</span>";
                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Category Name</label>
                                                        <input type="text" id="projectinput1" class="form-control" placeholder="Category Name"
                                                               name="S-Category">

                                                        <?php
                                                            if (!empty($errors['name-error'])){
                                                                echo "<span class='text-danger'>".$errors['Category-error']."</span>";
                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Stror phone</label>
                                                        <input type="number" id="projectinput1" class="form-control" placeholder="Stror phone"
                                                               name="S-phone">

                                                        <?php
                                                            if (!empty($errors['phone-error'])){
                                                                echo "<span class='text-danger'>".$errors['phone-error']."</span>";
                                                            }
                                                        ?>

                                                    </div>
                                                </div>                                               
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Stror Description</label>
                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Stror Description"
                                                               name="S-description">

                                                        <?php
                                                        if (!empty($errors['description-error'])){
                                                            echo "<span class='text-danger'>".$errors['description-error']."</span>";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Stror Adress</label>
                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Stror Adress"
                                                               name="S-Adress">

                                                        <?php
                                                        if (!empty($errors['description-error'])){
                                                            echo "<span class='text-danger'>".$errors['description-error']."</span>";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
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

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<?php
    include "parts/footer.php";
?>
</body>

</html>