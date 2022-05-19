<?php
    include "../DB_CONNECTION.php";
    if(isset($_GET['review'])) {
        $store_id = $_GET['id'];
        $rating_value = $_GET['rating'];
          echo($store_id);
        $string=exec('getmac');
        $mac=substr($string, 0, 17);
        echo $mac;
        $checkMac = "select * from rating where store_id = $store_id and mac_user = '$mac'";
        $checkMacResult = mysqli_query($connection,$checkMac);
        if (!empty($checkMacResult) && $checkMacResult->num_rows > 0) {
            header("Location: store_profile.php?id=$store_id&message=the user already rate this store");
        } else {
            $queryInsert = "INSERT INTO `project2`.`rating`(`num_rating`,`store_id`,`mac_user`) VALUES($rating_value,$store_id,'$mac')";
            $result5 = mysqli_query($connection,$queryInsert);

            header("Location: store_profile.php?id=$store_id");
            
        }
    }