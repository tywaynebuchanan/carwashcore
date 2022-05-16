
<section class="slide">
    <img src="assets/images/login.svg" alt="">
</section>

<section class="main">
    <div class="login-container">
        <p class="title">
            Welcome Back
        </p>
        <div class="separator">

        </div>
        <p class="welcome-message">
            Provide you login information
        </p>
     <?php 
     if(isset($_GET['message'])){
        if($_GET['message'] == 'empty'){
            echo '
           <div class = "error">
           You need to enter your username and password!
           </div>
            ';
        }
        if($_GET['message'] == 'notloggedin'){
            echo '
           <div class = "error">
           Opps! Look like you are not logged in!
           </div>
            ';
        }

        if($_GET['message'] == 'invalid'){
            echo '
           <div class = "error">
           Unknown username and password
           </div>
            ';
        }

        if($_GET['message'] == 'logout'){
            echo '
           <div class = "success">
           You have been logged out!
           </div>
            ';
        }

     }
        
     
     ?>
        <form action = "index.php" method="POST" class="login-form">
            <div class="form-control">
                <input type="text" name="username" id="username" placeholder="Username"
                >
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <input type="password" name="password" id="password" placeholder="Password">
                <i class="fas fa-lock"></i>
            </div>
            <input type="submit" class="submit" name="submit" value="Submit">
        </form>
    </div>
</section>


