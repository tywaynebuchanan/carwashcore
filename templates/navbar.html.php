<?php $totals = new displayDashboard();


?>

<!--Navbar-->
<nav class="navbar is-light has-shadow is-size-5" role="navigation" aria-label="main navigation">
  <div class="container">
  <div class="navbar-brand">
    <a class="navbar-item" href="dashboard.php">
      <div class="logo">
     <h1 class="title">
         Car City
     </h1>
      </div>
      
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="dashboard.php">
        Home
      </a>

      <!-- <a class="navbar-item" href="addinfo.php">
       Add Client
      </a> -->

      <a class="navbar-item" href="currentjobs.php">
       Current Jobs
      </a>
      <a class="navbar-item" href="completecars.php">
       Completed Cars
      </a>
      <a class="navbar-item" href="report.php">
      <i class="fas fa-file-chart-pie"></i>
      Reports
      </a>

     

     
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
      <div class="navbar-item is-hoverable">
        <a class="navbar-item">
         <!-- <?php echo $_SESSION['username'];?> -->
        </a>

        <!-- <div class="navbar-dropdown">
        <a class="navbar-item" href="./dashboard.php">
           Current Jobs
          </a>
          <a class="navbar-item" href="./completecars.php">
          Completed Cars
          </a>
         
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
        </div>
      </div> -->
        <div class="buttons">
        <a class="navbar-item" href="cart.php">
        <i class="fas fa-shopping-cart"> <span class ="tag is-danger align"><?php echo $totals->totals();?></span></i>
      </a>
          <a class="button is-link" href="logout.php">
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>
  </div>
</nav>
<!--Navbar-->