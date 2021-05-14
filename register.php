<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>
<body>
    <?php
    include "dbconnect.php";
    if(isset($_POST['submit'])){
        $username  = mysqli_real_escape_string($con, $_POST['username']);
        $email  = mysqli_real_escape_string($con, $_POST['email']);
        $password  = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword  = mysqli_real_escape_string($con, $_POST['cpassword']);

        $pass = password_hash($password,PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword,PASSWORD_BCRYPT);

        $emailquery = "select * from registration where email = '$email'";
        $query = mysqli_query($con,$emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
          // echo "email already exists";
          ?>
          <script>
          alert("email already exists");
         
          </script>
          <?php
         
        }else{
          if($password === $cpassword){

            $insertquery = "insert into registration(username, email, password, cpassword) values ('$username','$email','$pass','$cpass')";
            $iquery = mysqli_query($con,$insertquery);
            
            if($iquery){
              ?>
              <script>
              alert("data inserted");
              </script>
              <?php
            }else{
              ?>
              <script>
              alert("data not inserted");
              </script>
              <?php
            }
          }else{
            ?>
            <script>
            alert("password donot match");
            </script>
            <?php
          }
        }
    }
    ?>
    <!-- Sign Up-form -->
    <div class="container form-wrap">
      <div class="mb-2 heading">
        <h3 class="mb-5 mt-2">Sign Up Form</h3>
        </div>
    <form action = "<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method = "POST">
        <div class="form-group">
          <label for="user-name" class="text-muted">Username</label>
          <input type="text" class="form-control user" id="user-name" name="username" required>
         
        </div>

        <div class="form-group">
            <label for="email" class="text-muted">Email</label>
            <input type="email" class="form-control email" id="email" name="email" required>
           
        </div>

        <div class="form-group">
          <label for="password" class="text-muted">Password</label>
          <input type="password" class="form-control password" id="password" name="password" required>
        
        </div>

          <div class="form-group">
            <label for="confirm-password" class="text-muted">Confirm Password</label>
            <input type="password" class="form-control password" id="confirm-password" name="cpassword" required>
            
          </div>

        <div class="form-group">
          <input type="checkbox" class="form-check-input check" id="check-box" required>
          <label class="form-check-label text-muted" for="check-box">Agree to terms and conditions</label>
        
        </div>
        <button type="submit" class="btn btn-block btn-primary btnn" name="submit" >Submit</button>
      </form>
      </div>

      <!-- links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 
</body>
</html>