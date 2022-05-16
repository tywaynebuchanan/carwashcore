<?php 

    if(isset($_POST['submit'])){
        require('lib/config.php');
      $username = $_POST['username'];
       $password = $_POST['password'];
    //    sanitizeInput($conn,$username);
    //      sanitizeInput($conn,$password);
         
    if(empty($username) && empty($password)){
        header("Location: index.php?message=empty");
        }else{
            $sql = "SELECT * FROM tblusers WHERE username = '$username' and password = '$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
            if($row==1){
                session_start();
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['username'] = $username;
                $update = "UPDATE tblusers SET isLoggedin = 1 WHERE username = '$username'";
                $result = mysqli_query($conn, $update);
                header("Location: dashboard.php");
            }else{
                header("Location: index.php?message=invalid");
            }

        }
}
