<?php 
session_start();
include('lib/config.php');
include('includes/function.php');
include('includes/customfunctions.php');
include('includes/showCars.class.php');
isLoggedin();
$stmt = new displayDashboard();
$service = new displayDashboard();
$totals = new displayDashboard();
$car = new showCars($conn);

$grand_total = 0;
$allitems = '';
$services = array();

$stmt = $conn->prepare("SELECT CONCAT(quantity,'-',service_name) AS itemqty,total_price FROM cart");
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
    $grand_total += $row['total_price'];
    $services[] = $row['itemqty'];
    
}
$allitems = implode(',',$services);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bulma-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/3ca45502f4.js" crossorigin="anonymous"></script>
    <!--Custom JS-->
    <script src="assets/js/script.js"></script>
    <!--Custom CSS-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" 
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous" type="text/javascript"></script> -->
    <title>Cash Wash Management System</title>
</head>
<body>

<?php include('templates/navbar.html.php'); ?>

    <!--Services-->

    <section class="section">
    <div class="container is-max-desktop">
       
    <article class="message is-large">
    <div class="message-body has-text-centered">
    
                <strong>Services:</strong>
                 <?php 
                 if(empty($allitems)){
                      echo '<p>No services was placed for this order</p>';
                 }else{
                  echo $allitems; }?>
                
                
                
              
                <strong>Grand Total: </strong>$<?php echo number_format($grand_total,2);?>
      
    </div>
    </article>
      
       
      
    </div>
    </section>
    
    <!--Section Header-->
 <section class="section">
    <div class="container is-max-desktop">
      
    </div>
    

    <!--End Services-->
    <?php
    if(isset($_GET['message'])){
        if($_GET['message'] == 'Please fill out all fields'){
            echo '<div class="notification is-danger is-light">
            <button class="delete"></button>
           Please fill in all fields.
            </div>';
        }
    }
        ?>
  </section>

  <!--Section Header End-->

<?= include('templates/checkoutform.html.php');
include('templates/footer.html.php');

?>
</body>
</html>