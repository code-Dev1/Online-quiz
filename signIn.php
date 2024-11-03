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
            <h2 class="text-center">Sign In</h2>
          </div>
          <form action="">
            <div class="card-body">
              <div class="form-floating border-bottom mb-3">
                <input type="email" class="border-0 form-control" id="email" placeholder="Email" required>
                <label for="email">Email</label>
              </div>
              <div class="form-floating border-bottom mb-3 input-box">
                <input type="password" class="border-0 form-control" id="password" placeholder="Password" required>
                <label for="email">Password</label>
                <i class="fa fa-eye icon toggle"></i>
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="" id="remembar">
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
<!-- start footer -->
<?php include_once 'pages/user/common/footer.php' ?>