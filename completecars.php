<?php
include('lib/config.php');
include('includes/function.php');
include('templates/header.html.php');
include('templates/navbar.html.php');
include('templates/completecars.html.php');
templateheader("Car Wash Management &mdash; Completed Cars");


$stmt = new displayDashboard();



include('templates/footer.html.php');

?>
