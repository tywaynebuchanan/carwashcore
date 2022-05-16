<?php 
include('includes/function.php');
include('lib/config.php');
$stmt = new displayDashboard();

$service = new displayDashboard();


?>

<!--Container for all products-->
<section class="section">
    <div class="container">
    <!-- <div class="notification" id = "message">
        <button class="delete"></button>
        
    </div> -->
    <h1 class="title">
       Services 
      </h1>
      <p class="subtitle">
              Please select the services for the vehicle
    </p>

    

    <?php
    
    if(isset($_GET['message'])){
        if($_GET['message'] == 'success'){
            echo '
            <div class="notification is-success">
            <button class="delete"></button>
           Service was added to your order!
            </div>
            ';
        }
        if($_GET['message'] == 'failed'){
            echo '
            <div class="notification is-danger">
            <button class="delete"></button>
           Service was not added to your order!
            </div>
            ';
        }
    }
    ?>
          
    <div class="buttons">
        <a class="button is-link is-light" href="dashboard.php?id=1"><i class="fas fa-car"></i>Cars</a>
          <a class="button is-link is-light" href="dashboard.php?id=2"><i class="fas fa-car"></i>SUVs</a>
          <a class="button is-link is-light" href="dashboard.php?id=1"><i class="fas fa-car"></i>Trucks</a>
          <a class="button is-link is-light" href="dashboard.php?id=1"><i class="fas fa-car"></i>Cars</a>
          <a class="button is-link is-light" href="dashboard.php?id=1"><i class="fas fa-car"></i>SUVs</a>
          <a class="button is-link is-light" href="dashboard.php?id=1"><i class="fas fa-car"></i>Trucks</a>
        </div> 



        <div class="columns">  
        <?php
                
                    $products = $stmt->showProducts();
                
        
        
        ?>
        </div>
    </div>
</section>

<section class="custom-section">
    
</section>


 <!--Container for all products end-->

