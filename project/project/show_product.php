<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php

include "partial/header.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern"
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
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Products </h4>
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
                                <div class="card-body card-dashboard table-responsive">
                                    <table
                                           class="table table-responsive display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                        <tr>
                                            <th>Product ID</th>

                                            <th> Name</th>
                                            <th> Details</th>
                                            <th>Status</th>

                                            <th>First Price</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Qty</th>
                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        include_once 'DB_CONNECTION.php';
                                        $limit = 3;
                                        $page = $_GET['page'] ?? 1;
                                        $offset = ($page - 1) * $limit;

                                        $query = "SELECT * from product ORDER BY id DESC 
                                       limit $limit offset  $offset  ";
                                        $result = mysqli_query($connection, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if ($row['status'] == 1) {
                                                    $status = "<span class='badge badge-success'>Active</span>";
                                                } else {
                                                    $status = "<span class='badge badge-danger'>Block</span>";

                                                }


                                                echo '<tr>'
                                                    . '<td> ' . $row['id'] . '</td>'
                                                    . '<td>' . $row['name'] . '</td>'
                                                    . '<td>' . $row['details'] . '</td>'
                                                    . '<td>' . $status . '</td>'
                                                    . '<td>' . $row['first_price'] . ' $</td>'
                                                    . '<td>' . $row['price'] . '$</td>';


                                                echo "<td>" . $row['category_id'] . "</td>";

                                                echo "<td>";
                                                $query2="SELECT * from product_file where product_id = '".$row['id']."'";
                                                $result2=mysqli_query($connection,$query2);
                                                while($file_image=mysqli_fetch_assoc($result2)){
                                                    echo "<img width='100px' height='100px' src='uploads/images/" .$file_image['image']."'>";
                                                }
                                                echo "</td>";



                                                echo ' <td > ' . $row['qty'] . ' </td > ' .


                                                    '<td >

<a href = "edit_category.php?id=' . $row['id'] . '" class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1" ><i
                                                                        class="icon-eye" ></i ></a >
        ' .
                                                    '
<form action = "delete_product.php" class="c_form" id = "form" method = "POST" >
<input type = "hidden" name = "id" value = "' . $row['id'] . '"> 
<button type = "submit" class="btn btn-danger delete-btn" id = "delete-btn"0 > DELETE</button > </form ></td > ' . '</tr > ';
                                            }
                                        }

                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="justify-content-center d-flex">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $query = "SELECT count(id) as row_no from product";
                            $result = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($result);
                            $pages = ceil($row['row_no'] / $limit);

                            echo "<ul class='pagination'>";
                            for ($i = 1; $i <= $pages; $i++) {
                                echo "<li class='page - item'>
                    <a href='show_product.php?page=" . $i . "' class='page-link'>$i</a></li>";
                            }


                            ?>


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
<script>
    // $(' . delete - btn').click(function () {
    //     var result = confirm('Are You Sure !!!');
    //     if (result) {
    //         $(' . c_form').submit();
    //
    //     }
    // });


</script>
</body>

</html>