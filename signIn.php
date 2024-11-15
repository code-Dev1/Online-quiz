<?php session_start(); ?>
<!-- header link meta tag and more  -->
<?php include_once 'pages/user/common/header.php' ?>
<!-- navbar  -->
<?php include_once 'pages/user/common/navbar.php' ?>
<!-- page header -->
 <?php include_once 'config/db_connection.php' ?>

<header class="header-img" style="background-image: url(Assets/images/home-bg.jpg); height: 10rem;"></header>
<!-- start main  -->
<main class="mt-5 mb-5">
  <div class="container px-4 px-lg-5 mt-5 mb-5">
    <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
      <div class="col-md-10 col-lg-8 col-xl-7 mb-5">
        <div class="card shadow mt-5 mb-5">
          <div class="card-header">
            <h2 class="text-center">Sign In</h2>
          </div>
          <form action="signin.php" method ='post'>
            <div class="card-body">
              <div class="form-floating border-bottom mb-3">
                <input type="text" class="border-0 form-control" id="username" name="username" placeholder="Username" required>
                <label for="username">Username</label>
              </div>
              <div class="form-floating border-bottom mb-3 input-box">
                <input type="password" class="border-0 form-control" id="password"name = "password" placeholder="Password" required>
                <label for="email">Password</label>
                <i class="fa fa-eye icon toggle"></i>
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="remember" id="remembar">
                <label class="form-check-label" for="remembar">Remembar</label>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-between">
                <a href="signUp">Sign Up</a>
                <a href="forgot">Forgot password?</a>
                <input class="btn btn-dark" type="submit" value="Sign In">
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
  //git data from form
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    
  //check data from database
  $sql = "SELECT uId, userName, password, role FROM users WHERE userName = :username";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //start the session and git data 
    if ($user && password_verify($password, $user['password'])) {
    // save user data in session
    $_SESSION['uId'] = $user['uId'];
    $_SESSION['userName'] = $user['userName'];
    $_SESSION['userRole'] = $user['role'];

    //redirect user acording to the role
    if ($user['role'] === 'admin') {
      //ob_start();
      header('Location: Pages/admin/dashboard.php');  // admin page
    } elseif ($user['role'] === 'teacher') {
        header('Location: teacher_dashboard.php');  // techer page 
    } else {
        header('Location: dashboard.php');  // user page
    }
    exit();
    } else {
      echo "Invalid username or password";

    }
    }
?>
<!-- start footer -->
<?php include_once 'pages/user/common/footer.php' ?>