<?php 

require('lib/config.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $code = $_POST['code'];
    $quantity = 1;
    $vc = $_POST['vc'];
    $total = $price * $quantity;

    //Select from the cart first
    $stmt = $conn->prepare("SELECT * FROM cart WHERE service_code = '$code'");
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $codedb = $r['service_code'];



    if(!$code == $codedb){
        session_start();
        $stmt = $conn->prepare("INSERT INTO cart (service_name,service_price,quantity,total_price,service_code,vehicle_code) VALUES ('$name','$price','$quantity','$total','$code','$vc')");
        // $stmt->bind_param("siiii",$name,$price,$quantity,$total,$code);
        $stmt->execute();
        header('location:dashboard.php?message=success');
    }else{
    header('location:dashboard.php?message=failed');
}
}
$stmt->close();





