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
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Categories </h4>
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
                                <div class="card-body card-dashboard">
                                    <table style="width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                        <thead>
                                        <tr>
                                            <th>Stor Name</th>
                                            <th> Stor Details</th>

                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>DELETE</th>
                   
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                include_once "DB_CONNECTION.php";

                                                $limit = 3;
                                                $page = $_GET['page'] ?? 1;
                                                $offset = ($page - 1) * $limit;
                                                $query="SELECT * from stores  ORDER BY id LIMIT 3 OFFSET $offset";
                                                $result=mysqli_query($connection,$query);
                                                if (mysqli_num_rows($result)>0){
                                                    while ($row=mysqli_fetch_assoc($result)){
                                                      
                                                        echo "<tr>".
                                                                "<td>".$row['name']."</td>".
                                                                "<td>".$row['description']."</td>".
                                                                "<td>
                                                                    <a href='Edit_Stor.php?id=".$row['id'] ."' class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'><i
                                                                    class='icon-eye'></i></a>
                                                                </td>".
                                                                "<td>".
                                                               " <img src=" .  "upload/Images/". $row['Image'].  " style='width:150px;height:100px;'"." >".

                                                                "</td>".
                                                                "<td>
                                                                    <form class='c_form' action='Delet_Stor.php' method='post'>
                                                                    <input type='hidden' name='id' value='".$row['id']."'>
                                                                        <button type='submit' class='btn btn-danger delete_stor' id='delete-btn'>
                                                                            DELETE
                                                                        </button>
                                                                    </form>
                                                                </td>"


                                                            ."</tr>";
                                                    }
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                    <div class = "justify-content-center- d-flex">
                                    <div class="row">
                                        <div class = "col-12">
                                        <?php
                                        $query = "SELECT count(id) as row_no from stores";
                                        $result = mysqli_query($connection, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        $page_count = ceil($row['row_no'] / $limit);
                                        echo "<ul class = 'pagination'>";
                                        for($i = 1; $i <= $page_count; $i++){
                                            echo "<li class = 'page-item'>
                                            <a href = 'show_all_stor.php?page=" .$i. "' class = 'page-link'>$i</a></li>";
                                        }
                                        ?>
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
<script>

    $('.delete_stor').click(function (){
        var result = confirm("Are You Sure !!? ");
        if (result){
            $('c_form').submit();
        }
    })

</script>
</body>

</html>