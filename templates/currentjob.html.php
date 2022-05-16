<?php 
$current = new displayDashboard();
include('includes/messages.php');

?>
<section class="section">
    <div class="container">
    <h1 class="title">
      Current Jobs
      </h1>
      <p class="subtitle">
              These are the current jobs waiting
    </p>
    <?= message();?> 
</section>

<!--Table Section-->

    <section class="section">
        <div class="container">
            <table class="table is-fullwidth is-striped is-bordered has-text-centered">
                <tbody>
                    <?php $current->currentJob()?>
                </tbody>
               
                
            </table>

        </div>
    </section>

<section class="custom-section">
    
</section>

<!--Table Section-->