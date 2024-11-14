<!-- Database connection -->
 <?php include_once 'config/db_connection.php'; ?>
<!-- header link meta tag and more  -->
<?php include_once 'pages/user/common/header.php' ?>
<!-- navbar  -->
<?php include_once 'pages/user/common/navbar.php' ?>
<!-- page header -->
<header class="header-img" style="background-image: url(Assets/images/home-bg.jpg); height: 10rem;"></header>
<!-- start main  -->
<main class="mt-5 mb-5">
  <div class="container px-4 px-lg-5 mt-5 mb-5">
    <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
      <div class="col-md-10 col-lg-8 col-xl-7 mb-5">
        <div class="card shadow mt-5 mb-5">
          <div class="card-header">
            <h2 class="text-center">Sign Up</h2>
          </div>
          <form action="signup.php" method='post'>
            <div class="card-body">
              <div class="form-floating border-bottom mb-3">
                <input type="text" class="border-0 form-control" id="fullname" name = "fullname" placeholder="Full Name" required>
                <label for="fullname">Full Name</label>
              </div>
              <div class="form-floating border-bottom mb-3">
                <input type="text" class="border-0 form-control" id="username" name = "username" placeholder="Username" required>
                <label for="username">Username</label>
              </div>
              <div class="form-floating border-bottom mb-3">
                <input type="email" class="border-0 form-control" id="email" name = "email" placeholder="Email" required>
                <label for="email">Email</label>
              </div>
              <div class="form-floating border-bottom mb-3 input-box">
                <input type="password" class="border-0 form-control" id="password" name = "password" placeholder="Password" required>
                <label for="password">Password</label>
                <i class="icon fa fa-eye toggle"></i>
              </div>
              <div class="form-floating border-bottom mb-3 input-box">
                <input type="password" class="border-0 form-control" id="confirm" name = "confirmPassword" placeholder="Password" required>
                <label for="confirm">Confirm Password</label>
                <i class="icon fa fa-eye confirm"></i>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-between">
                <a href="signIn">Sign In</a>
                <input class="btn btn-dark" type="submit" value="Sign Up">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- end main  -->
<?php 
//Git data and save in database
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

    
      //Somple validition for email address
      if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        Die ("your email is not correct ! ");
      }

      //password confirm validition
      if ($password !== $_POST['confirmPassword']) {
        die("Passwords do not match!");
      }
    

      // hash password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (fullName,userName,email,password) VALUES(:fullname, :username, :email, :password)";
  $stmt = $conn->prepare($sql);
  
  $stmt->bindParam(':fullname', $fullname);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $hashedPassword);
  if($stmt->execute()){
      echo "Registration successful";
  } else {
      echo "Registration failed: " . implode(", ", $stmt->errorInfo());
  }
} 
?>
<!-- start footer -->
<?php include_once 'pages/user/common/footer.php' ?>