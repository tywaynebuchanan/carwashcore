<?php 
include('includes/customfunctions.php');
$current = new displayDashboard();

$filter = '';



?>


<section class="section">
    <div class="container">
    <h1 class="title">
      Completed Jobs
      </h1>
      <p class="subtitle">
              These are the completed jobs waiting
    </p>
    <?= message();?> 
    <div class="buttons">
        <a href="completecars.php" class = "button is-link">All Records</a>
        <a href="completecars.php?filter=Male" class = "button is-link">Male</a>
        <a href="completecars.php?filter=Female" class = "button is-link">Female</a>
       
                <div class="field has-addons is-expanded">
                 <div class="control">
                    <input class="input" type="date" name="date">
                 </div>
                <div class="control">
                <a class="button is-link" href="completecars.php?filter=date">Search</a>
                </div>
            </div>
     </div>
</section>

<!--Table Section-->

    <section class="section">
        <div class="container">
            <table class="table is-fullwidth is-striped is-bordered has-text-centered">
              <?php filter($filter);?> 
            </table>

        </div>
    </section>

    <section class="custom-section">

    </section>

<!--Table Section-->