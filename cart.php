<?php 
session_start();
require('lib/config.php');
require('includes/function.php');
require('templates/header.html.php');
require('templates/navbar.html.php');
require('includes/customfunctions.php');
isLoggedin();
templateheader("Car Wash Management &mdash; Cart");

$cart = new displayDashboard();
$totals = new displayDashboard();
$in_cart = $totals->totals($conn);

if(isset($_POST['remove'])){
    $id = $_POST['id'];
    $stmt =$conn->prepare("DELETE FROM cart WHERE id = '$id'");
    $stmt->execute();
    if($stmt){
        header('location:cart.php?message=success');
    }else{
        header('location:cart.php?message=failed');
    }
    $stmt->close();
}

require('templates/cart.view.php');
require('templates/footer.html.php');
?>

    