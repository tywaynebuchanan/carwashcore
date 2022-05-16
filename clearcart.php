<?php
require('lib/config.php');
    $stmt = $conn->prepare("DELETE FROM cart");
    $stmt->execute();

    if($stmt){
        header('location:cart.php?message=Finished');
    }else{
        header('location:cart.php?message=failed');
    }

    $stmt->close();