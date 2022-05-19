<?php
include_once 'DB_CONNECTION.php';
$errors=[];
$success=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $description=$_POST['c_description'];
if(isset($_POST['status'])){
$status=$_POST['status'];
}else{
    $status=0;
}
$date=Date("y-m-d h:i:s");
}
if(empty($name)){
    $errors['name_error']="Name is Required please fill it";
}if(empty($description)){
    $errors['name_description']="description is Required please fill it";
}
if(count($errors)>0){
    $errors['general_errors']='please fill all errors';

}else{


$query="INSERT INTO Category
    (name ,description,status,time)
VALUES('$name','$description','$status','$date')";
$result=mysqli_query($connection,$query);
if($result){
$errors=[];
    $success=true;
    header('Location:show_all_category.php');


}else{
    $errors['general_errors']='please fill all errors';
    echo 'Error' .mysqli_error($connection);
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
 ?>
 <?php
 include "parts/sideBar.php";
 ?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">   <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">Category</h4>
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
                    <div class="card-text">
                      <p>This is the most basic and default form having form sections.
                        To add form section use <code>.form-section</code> class
                        with any heading tags. This form has the buttons on the bottom
                        left corner which is the default position.</p>
                    </div>
                    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>add New Category</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">Category Name</label>
                              <input type="text" id="projectinput1" class="form-control" placeholder="First Name"
                              name="name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">Category description</label>
                              <input type="text" id="projectinput2" class="form-control" placeholder="Category description"
                              name="c_description">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">status</label>
                              <input type="checkbox" id="projectinput2"
                              name="status" value="1">
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
        <!-- // Basic form layout section end -->
      </div>
    </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 <?php
 include "parts/footer.php";
 ?>
  
</body>

</html>