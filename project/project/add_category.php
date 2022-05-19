<?php
    include_once 'DB_CONNECTION.php';

    $errors=[];
    $success=false;
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        $name=$_POST['c_name'];
        $description=$_POST['c_description'];
        isset($_POST['status']) ? $status=$_POST['status'] : $status=0;
//        if (isset($_POST['status'])){
//            $status=$_POST['status'];
//        }else{
//            $status=0;
//        }
        $date=Date("y-m-d h:i:s");

        if(empty($name)){
            $errors['name-error']="Name Is Required Please Fill It";
        }
        if(empty($description)){
            $errors['description-error']="Description Is Required Please Fill It";
        }

        if (count($errors) >0){
            $errors['general_error']="Please Fix All Error";
        }else{
            $query="INSERT INTO categories
                (name,description,status,created_at)
                VALUES('$name','$description','$status','$date')";
            $result=mysqli_query($connection,$query);
            if($result){
                $errors=[];
                $success=true;
            }else{
                $errors['general_error']=mysqli_error($connection);
            }
        }


    }
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php
    include "partial/header.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern"
      data-col="2-columns">
<!-- fixed-top-->
<?php
    include "partial/nav.php";
    include "partial/sidebar.php";
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
                                <h4 class="card-title" id="basic-layout-form">Category Info</h4>
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
                                        echo "<div class='alert alert-success'>Category Added Successfully</div>";



                                    ?>



                                    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Add New Category</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Category Name</label>
                                                        <input type="text" id="projectinput1" class="form-control" placeholder="Category Name"
                                                               name="c_name">

                                                        <?php
                                                            if (!empty($errors['name-error'])){
                                                                echo "<span class='text-danger'>".$errors['name-error']."</span>";
                                                            }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Category Description</label>
                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Category Description"
                                                               name="c_description">

                                                        <?php
                                                        if (!empty($errors['description-error'])){
                                                            echo "<span class='text-danger'>".$errors['description-error']."</span>";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput3">Status</label>
                                                        <input type="checkbox" id="projectinput3" name="status" value="1">
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
    include "partial/footer.php";
?>
</body>

</html>