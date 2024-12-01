<?php include_once 'pages/user/common/header.php' ?>


<?php
if (isset($_POST['sub']) && $_SERVER['REQUEST_METHOD'] === "POST") {
  $user = new User;
  $user->registers($_POST['frm']);
}

?>


<!-- header link meta tag and more  -->
<!-- navbar  -->
<!-- <?php include_once 'pages/user/common/navbar.php' ?> -->
<!-- page header -->
<!-- <header class="header-img" style="background-image: url(Assets/images/home-bg.jpg); height: 10rem;"></header> -->
<!-- start main  -->
<main class="mt-5 mb-5">
  <div class="container px-4 px-lg-5 mt-5 mb-5">
    <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
      <div class="col-md-10 col-lg-8 col-xl-7 mb-5">
        <div class="card shadow mt-5 mb-5">
          <div class="card-header">
            <h2 class="text-center">Sign Up</h2>
          </div>
          <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="card-body">
              <?php Semej::show() ?>
              <div class="form-floating border-bottom mb-3">
                <input name="frm[name]" type="text" class="border-0 form-control" id="fullname" placeholder="Full Name" required>
                <label for="fullname">Full Name</label>
              </div>
              <div class="form-floating border-bottom mb-3">
                <input name="frm[username]" type="text" class="border-0 form-control" id="username" placeholder="Username" required>
                <label for="username">Username</label>
              </div>
              <div class="form-floating border-bottom mb-3">
                <input name="frm[email]" type="email" class="border-0 form-control" id="email" placeholder="Email" required>
                <label for="email">Email</label>
              </div>
              <div class="form-floating border-bottom mb-3 input-box">
                <input name="frm[password]" type="password" class="border-0 form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                <i class="icon fa fa-eye toggle"></i>
              </div>
              <div class="form-floating border-bottom mb-3 input-box">
                <input name="frm[confirm]" type="password" class="border-0 form-control" id="confirm" placeholder="Password" required>
                <label for="confirm">Confirm Password</label>
                <i class="icon fa fa-eye confirm"></i>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-between">
                <a href="signIn">Sign In</a>
                <input name="sub" class="btn btn-dark" type="submit" value="Sign Up">
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

<!-- <?php include_once 'pages/user/common/footer.php' ?> -->