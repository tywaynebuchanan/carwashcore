<?php 

require('lib/config.php');
    $firstname = $_GET['id'];
    $stmt = $conn->prepare("UPDATE tbl_orders SET status_id = 1 WHERE firstname = '$firstname'");
    $stmt->execute();

    if($stmt){
        header('location:currentjobs.php?message=Finished');
    }else{
        header('location:currentjobs.php?message=failed');
    }

    $stmt->close();

