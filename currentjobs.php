<?php
include('lib/config.php');
include('includes/function.php');
include('templates/header.html.php');
include('templates/navbar.html.php');
include('templates/currentjob.html.php');
templateheader("Car Wash Management &mdash; Current Jobs");

$stmt = new displayDashboard();

include('templates/footer.html.php');

?>





