<div class="container">
    <section class="section">
    <div class="container">
    <h1 class="title">
       Order Summary
      </h1>
      <p class="subtitle">
              Please finish the order for the person
    </p>
    </div>
</section>
<?php 

    if(isset($_GET['message'])){
        if($_GET['message'] == 'success'){
            echo '
            <div class="container is-max-desktop">
            <div class="notification is-success">
            <button class="delete"></button>
           Order was deleted!
            </div>
            </div>
            ';
        }
    }

?>
<section class="section">
    <div class="container is-max-desktop">
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth has-text-centered">
                
                <tbody>
            <?php $cart->showCart(); ?>
                </tbody>
            </table>
           
            <div class="buttons is-right">
              <?php 

              if($in_cart == 0){
                echo '<a class="button is-danger" href="#" disabled><i class="fas fa-exclamation-triangle"></i></a>';
              }else{
                echo '
                <div class="buttons">
                <a href="checkout.php" class="button is-success"> <i class="fas fa-comment-dollar"></i> Place Order</a>
                <a href="clearcart.php" class="button is-warning"> <i class="fas fa-trash-alt"></i> Clear Cart</a>
                </div>
                ';
              }
              ?>
                
            <!-- <input type="submit" class="button is-success" value="Place Order"> -->
        </div>
        </div>
    </div>
</section>

<section class="custom-section">
    
</section>
</div>
