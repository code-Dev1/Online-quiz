<!-- header link meta tag and more  -->
<?php include_once 'pages/user/common/header.php' ?>
<!-- navbar  -->
<?php include_once 'pages/user/common/navbar.php' ?>
<!-- page header -->
<header class="header-img" style="background-image: url(Assets/images/contact-bg.jpg)">
  <div>
    <div class="container px-4 px-lg-5">
      <div class="row justify-content-center gx-4 gx-lg-5">
        <div class="col-md-10 col-lg-8 col-xl-7">
          <div class="page-header text-white">
            <h1 class="header-font">Contact Me</h1>
            <span class="h5">Have questions? I have answers.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- start main  -->
<main class="mt-5 mb-5">
  <div class="container px-4 px-lg-5 mb-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <form action="">
          <div class="form-floating mb-3 border-bottom">
            <input type="text" class="form-control border-0" id="name" placeholder="Name" required>
            <label for="name">Name</label>
          </div>
          <div class="form-floating mb-3 border-bottom">
            <input type="Email" class="form-control border-0" id="email" placeholder="Email" required>
            <label for="name">Email</label>
          </div>
          <div class="form-floating mb-2 border-bottom">
            <textarea name="" class="border-0 form-control" id="message" placeholder="Enter your message here"
              style="height:12rem" required></textarea>
            <label for="message">Message</label>
          </div>
          <input type="submit" class="btn btn-dark text-uppercase float-end" value="Send">
        </form>
      </div>
    </div>
  </div>
</main>
<!-- end main  -->
<!-- start footer -->
<?php include_once 'pages/user/common/footer.php' ?>