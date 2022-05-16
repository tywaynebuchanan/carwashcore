<?php 

include('includes/totalfunctions.php');
?>

<section class="section">
    <div class="container">
    <h1 class="title">
      Reports
      </h1>
      <p class="subtitle">
            This is breakdown of the services offered for <?php echo date('Y-m-d')?>
    </p>

    <div class="container">
    <table class="table is-fullwidth is-bordered has-text-centered">
        <thead>
            <tr>
                <th>Total Cars</th>
                <th>Fit Nation</th>
                <th>TJams</th>
                <th>Wash Only</th>
                <th>Wash and Vaccum</th>
                <th>Vaccum Only</th>
                <th>Polish</th>
                <th>Total Revenue</th>
                <th>Total Discount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo countTotalCars(); ?></td>
                <td><?php echo countFitNation(); ?></td>
                <td><?php echo countTJ();?></td>
                <td><?php echo countWashOnly(); ?></td>
                <td><?php echo countWashVaccum(); ?></td>
                <td><?php echo countVaccum(); ?></td>
                <td><?php echo countPolish(); ?></td>
                <td>$<?php echo number_format(countRevenue(),2); ?></td>
                <td>$<?php echo number_format(countDiscount(),2); ?></td>
            </tr>
        </tbody>
    </table>
    </div>
</section>

<section class="custom-section">

</section>