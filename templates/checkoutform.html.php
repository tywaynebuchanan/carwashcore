<?php 

$status = $plate = $firstname = $lastname = $email = $phone = $gender = $car_make =
        $payment = $services = $amount = $ferror = $lerror = $emailErr = 
        $perror = $genderErr = $carErr = $payErr = $disErr = "";
        
        // global $conn;
        if(isset($_POST['submit'])){
            $plate = $_POST['plate'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = "876" . $_POST['phone'];
            $gender = $_POST['gender'];
            $car_make = $_POST['carmake'];
            $payment = $_POST['payment'];
            $services = $_POST['services'];
            $amount = $_POST['amount'];
            $discount = $_POST['discount'];
            $status = 0;

            function testData($input){
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }

            if(empty($firstname)){
                $ferror = "Please enter the customer first name";
            }else{
                $firstname = testData($firstname);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
                    $ferror = "Only letters and white space allowed";
                  }
            }

            if(empty($lastname)){
                $lerror = "Please enter the customer last name";
            }else{
                $lastname = testData($lastname);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
                    $lerorr = "Only letters and white space allowed";
                  }
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
              } else {
                $email = testData($email);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format";
                }
              }

              if(empty($phone)){
                $perror = "Please enter the customer's phone number";
            }else{
                $phone = testData($phone);
                if (!preg_match("/^[0-9]*$/",$phone)) {
                    $perror = "Only numbers allowed";
                  }
            }


            if ($gender == "--Select Gender--") {
                $genderErr = "Gender is required";
            } else {
                $gender = testData($gender);
            }


            if ($car_make == "NULL") {
                $carErr = "Car make is required";
            } else {
                $car_make = testData($car_make);
            }

            if ($payment == "NULL") {
                $payErr = "Payment method is required";
            } else {
                $payment = testData($payment);
            }

            if ($discount == "NULL") {
                $disErr = "Please select a discount";
            } else {
                $disErr = testData($discount);
            }

            if(empty($ferror) && empty($lerror) && empty($emailErr) && empty($perror) && empty($genderErr) && empty($carErr) && empty($payErr)){
               
                $sql = "INSERT INTO tbl_orders(plate,firstname, lastname, email,contact,gender,car_make,services,payment_mode,amount_paid,discount_id,status_id,timelogged) 
                VALUES ('$plate','$firstname','$lastname','$email','$phone','$gender','$car_make','$services','$payment','$amount','$discount','$status',CURRENT_TIMESTAMP)";
                $sql = mysqli_query($conn,$sql);
                if($sql){
                    
                    $stmt = "DELETE from cart";
                    $stmt = mysqli_query($conn,$stmt);
                    if($stmt){
                        header('Location:dashboard.php?message=Success');
                    }else{
                echo "<scrpit>alert('Please enter the blank fields')</script>";
                
            } 
        }
    }   
           
}
           

?>

<!--Section-->

<section class="section">
<div class="card">
    <div class="container is-max-desktop">
    
        <div class="custom-container">

        <h1 class="title has-text-centered">
       Add Client Information
      </h1>
      <p class="subtitle has-text-centered">
             Enter the information for the client.
          </p>
           

          
<!--Form-->
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method = "POST">

            <input type="hidden" name = "services" value="<?php echo $allitems;?>"> 
            <div class="field">
                    <label for="" class="label">License Plate</label>
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="text" name = "plate" placeholder="Enter the customer License Plate Number" 
                        maxlenght=6> 
                        <span class="icon is-small is-left">
                        <i class="fas fa-car"></i>
                        </span>
                    </p>
                    <p class="help is-danger"><?php echo $ferror;?></p>
                    
                </div>
            <div class="field">
                    <label for="" class="label">First Name</label>
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="text" name = "firstname" placeholder="Enter the customer first name">
                        <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                        </span>
                    </p>
                    <p class="help is-danger"><?php echo $ferror;?></p>
                    
                </div>

                <div class="field">
                    <label for="" class="label">Last Name</label>
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="text" name = "lastname" placeholder="Enter the customer last name" >
                        <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                        </span>
                    </p>
                    <p class="help is-danger"><?php echo $lerror;?></p>
                </div>

                <div class="field">
                    <label for="" class="label">Email</label>
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="email" name = "email" placeholder="Enter the customer email address">
                        <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                        </span>
                    </p>
                    <p class="help is-danger"><?php echo $emailErr;?></p>
                </div>

                <div class="field">
                   <label for="" class="label">Contact Number</label>
                    <div class="field-body">
                        <div class="field is-expanded">
                        <div class="field has-addons">
                            <p class="control">
                            <a class="button is-static">
                                +876
                            </a>
                            </p>
                            <p class="control is-expanded">
                            <input class="input" type="tel" name = "phone" placeholder="Your phone number" maxlength=7>
                            </p>
                        </div>
                        <p class="help is-danger"><?php echo $perror;?></p>
                        </div>
                    </div>
                </div>

                <!-- <div class="field">
                    <label for="" class="label">Contact Number</label>
                    <p class="control has-icons-left has-icons-right">
                    <a class="button is-static">
                                +44
                         </a>
                        <input class="input" type="text" name = "phone" placeholder="Enter the customer phone number">
                        <span class="icon is-small is-left">
                        <i class="fas fa-phone-alt"></i>
                        </span>
                    </p>
                    <p class="help is-danger"><?php echo $perror;?></p>
                </div> -->


                <div class="field">
                    <label class="label">Gender</label>
                        <div class="control">
                        <div class="select">
                            <select name="gender">
                                <option>--Select Gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <p class="help is-danger"><?php echo $genderErr;?></p>
                </div>

                <div class="field">
                    <label class="label">Car Make</label>
                        <div class="control">
                            <div class="select">
                                <select name="carmake">
                                    <option value = "NULL">--Select Car--</option>
                                    <?php echo $car->showCars()?>
                                </select>
                                </div>
                        </div>
                        <p class="help is-danger"><?php echo $carErr;?></p>
                </div>


                <div class="field">
                    <label class="label">Payment </label>
                        <div class="control">
                            <div class="select">
                                <select name="payment">
                                    <option value = "NULL">--Payment--</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Debit">Debit Card</option>
                                    <option value="Credit">Credit Card</option>
                                </select>
                                </div>
                        </div>
                        <p class="help is-danger"><?php echo $payErr;?></p>
                </div>

                <div class="field">
                    <label class="label">Discount</label>
                        <div class="control">
                            <div class="select">
                                <select name="discount">
                                    <option value = "NULL">Select </option>
                                    <option value="1">No Discount</option>
                                    <option value="2">10% Discount</option>
                                    <option value="3">Fit Nation</option>
                                </select>
                                </div>
                        </div>
                        <!-- <p class="help is-danger"><?php echo $disErr;?></p> -->
                </div>
                <input class="input" type="hidden" name = "amount" placeholder="Enter the amount paid" value = "<?php echo $grand_total?>">
                <div class="field is-grouped is-grouped-right">
                        <p class="control">
                            <input type="submit" class="button is-link" name="submit">
                        </p>
                        <p class="control">
                         <a class="button is-light" href="dashboard.php">
                             Cancel
                        </a>
                        </p>
                    </div>
        </div>
        </form>
        
        <!--Form End-->
    </div>

    </div>
</section>


<!--Section End-->