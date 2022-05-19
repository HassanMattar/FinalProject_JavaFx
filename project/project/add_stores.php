<?php
include 'DB_connection.php';
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $mobile_number = $_POST['mobile_number'];
    $category_id = $_POST['category_id'];
    //isset($_POST['active']) ? $active = $_POST['active'] : $active = 0;

    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    }
    if (empty($_POST["description"])) {
        $errors['description'] = "description is required";
    }
    if (empty($_POST["address"])) {
        $errors['address'] = "address is required";
    }
    if (empty($_POST["mobile_number"])) {
        $errors['mobile_number'] = "mobile_number is required";
    }

    if(!count($errors) > 0){
        // $data = date('Y-m-d h:i:s');

   
        $query = "INSERT into stores (name,description,address,mobile_number,category_id)
        VALUES ('$name', '$description', '$address', '$mobile_number', '$category_id')";
        $result = mysqli_query($connection, $query);
        $last_id = mysqli_insert_id($connection);

        if($result){
        $file_count = count($_FILES['image']['name']);
        for($i = 0; $i < $file_count; $i++){
            $file_name =$_FILES['image']['name'][$i];
            $file_size =$_FILES['image']['size'][$i];
            $file_type =$_FILES['image']['type'][$i];
            $file_tmp_name =$_FILES['image']['tmp_name'][$i];

            $file_ext = pathinfo($file_name , PATHINFO_EXTENSION);
            $file_new_name = time() . rand(1,100000) ."";

            $upload_path = 'uploads/images/'.$file_name;
            move_uploaded_file($file_tmp_name,$upload_path);

            $query1 = "INSERT into stores_file (stores_id,image)
            VALUES('$last_id','$file_new_name')";

            $result1 = mysqli_query($connection,$query1);
            if($result1){
                $success = true;
        }
    }

        
        }else{
            $errors['general_error'] = $connection->error;
        }
    }

}
?>

<html>
<?php
include "partial/header.php";
?>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern"
      data-col="2-columns">

<?php
include "partial/nav.php";
include "partial/sidebar.php";
?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Main </a>
                            </li>
                            <li class="breadcrumb-item"><a href="">
                            Stores</a>
                            </li>
                            <li class="breadcrumb-item active">Add Stores
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"></h4>
                                <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
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
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <?php
                                        if (!empty($errors['general_error'])) {
                                            echo "<div class='alert alert-danger'>" . $errors['general_error'] . "</div>";

                                        } elseif ($success) {
                                            echo "<div class='alert alert-success'>Product Added Successfully</div>";

                                        }


                                        ?>
                                        <form class="form" action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                              method="post" enctype="multipart/form-data"


                                        >
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>Add Store
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> Name </label>
                                                            <input type="text" id="name_ar"
                                                                   class="form-control"
                                                                   placeholder="Enter Name Of store"
                                                                   name="name">
                                                            <span class="text-danger errors">
                                                                <?php
                                                                if (isset($errors['name'])) {
                                                                    print_r($errors['name']);

                                                                }

                                                                ?>

                                                            </span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> Description </label>
                                                            <input type="text" id="description"
                                                                   class="form-control"
                                                                   placeholder="Enter description Of store"
                                                                   name="description">
                                                            <span class="text-danger errors">
                                                                <?php
                                                                if (isset($errors['description'])) {
                                                                    print_r($errors['description']);

                                                                }

                                                                ?>

                                                            </span>

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> Address </label>
                                                            <input type="text" id="address"
                                                                   class="form-control"
                                                                   placeholder="address of store"
                                                                   name="address">
                                                            <span class="text-danger errors">
                                                                <?php
                                                                if (isset($errors['address'])) {
                                                                    print_r($errors['address']);
                                                                }
                                                                ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> Mobile_number </label>
                                                            <input type="text" id="mobile_number"
                                                                   class="form-control"
                                                                   placeholder="mobile_number of store"
                                                                   name="mobile_number">
                                                            <span class="text-danger errors">
                                                                <?php
                                                                if (isset($errors['mobile_number'])) {
                                                                    print_r($errors['mobile_number']);
                                                                }
                                                                ?>

                                                            </span>
                                                        </div>
                                                    </div>


                                                </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> Category </label>
                                                            <select class="form-control"  name="category_id">
                                                                <?php
                                                                include 'DB_CONNECTION.php';
                                                                $query="SELECT * from categories";
                                                                $result=mysqli_query($connection,$query);
                                                                while($row=mysqli_fetch_assoc($result)){
                                                                    echo '<option value="'.$row['id'].'">' .$row['name']. '</option>';
                                                                }


                                                                ?>
                                                            </select>

                                                            <span class="text-danger errors">
                                                                <?php
                                                                if (isset($errors['category_id'])) {
                                                                    print_r($errors['category_id']);
                                                                }
                                                                ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> Image </label>
                                                            <input type="file" multiple
                                                                   class="form-control"
                                                                   name="image[]">
                                                            <span class="text-danger errors">
                                                                <?php
                                                                if (isset($errors['image'])) {
                                                                    print_r($errors['image']);
                                                                }
                                                                ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                            <section id="chkbox-radio">
                                                <div class="row">

                                                </div>

                                            </section>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> Back
                                                </button>
                                                <button type="submit" id="btn_create_product" class="btn btn-primary">
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
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
<?php
include "partial/footer.php";
?>
</body>

</html>