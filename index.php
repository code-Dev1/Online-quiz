<?php
require_once 'autoload.php';
$user = new User;
$quiz = new Quizzes;
$catagory = new Catagory;
$score = new UserAnswer;
$rows = $score->topUsers();
$userRseult = $user->totleUser();
$teacherResult = $user->totleTeacher();
$quizResult = $quiz->totleQuiz();
$catResult = $catagory->totleCatagory();
$cat = $catagory->indexCatagory();

if (isset($_POST['sub'])) {
  $auth = new Auth;
  $result = $auth->checkCookie();
  if (!$result) {
    header('location:signIn');
    die;
  } else {
    header('location:dashboard?page=home');
  }
}
?>
<!-- header link meta tag and more  -->
<?php include_once 'pages/user/common/header.php' ?>
<!-- navbar  -->
<?php include_once 'pages/user/common/navbar.php' ?>
<!-- page header -->
<header class="header-img" style="background-image: url(Assets/images/home-bg.jpg);">
  <div>
    <div class="container px-4 px-lg-5">
      <div class="row gx-5 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
          <div class="page-header">
            <span class="text-light fs-2 text-center font-monospace text-uppercase">can you answored our quiz ?</span>
            <form action="" method="post">
              <input type="submit" name="sub" class="mt-3 btn btn-outline-light" value="Let's Start >">
              <!-- <a name=" sub" href="dashboard?phge=home" class="mt-3 btn btn-outline-light" type="button">Let's Start ></a> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- main start -->
<main>
  <!-- section did you know start -->
  <section class="container my-5">
    <div class="font-monospace text-center">
      <h1>Catagories</h1>
    </div>
    <hr>
    <div class="row">
      <?php foreach ($cat as $val): ?>
        <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-3 my-lg-5">
          <div class="cards">
            <div class="front">
              <div class="card shadow">
                <img src="<?= $val->image ?>" alt="" class="card-img img-fluid">
                <div class="card-body">
                  <p><b><?= $val->title ?></b></p>
                  <span><?= mb_strimwidth($val->description, 0, 30, "....") ?></span>
                </div>
              </div>
            </div>
            <div class="back">
              <div class="card shadow card-w overflow-hidden">
                <div class="card-body row text-center align-items-center">
                  <h3><?= strtoupper($val->title) ?></h3>
                  <hr>
                  <span><?= $val->description ?></span>
                  <div>
                    <a href="dashboard" class="w-50 btn btn-outline-dark">Let's Start ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- best suore section start -->
  <section class="container my-5">
    <div class="font-monospace text-center mt-5">
      <h1>Who is best ?</h1>
    </div>
    <hr>
    <table class="table table-responsive my-5">
      <thead>
        <th>#NO</th>
        <th>Full Name</th>
        <th>Country</th>
        <th>Date</th>
        <th>Score</th>
      </thead>
      <tbody>
        <?php $x = 1;
        foreach ($rows as $row): ?>
          <tr>
            <td><?= $x++ ?></td>
            <td><?= $row->fullName ?></td>
            <td><?= $row->country ?></td>
            <td><?= $row->scores ?></td>
            <?php $t = strtotime($row->date);
            $d = time() - $t;
            $day = floor($d / (60 * 60 * 24)) ?>
            <td><?= ($day != 0) ? ($day == 1) ? $day . ' ago' : $day . 's ago'  : 'Today'  ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
  <section class="bg-dark-50 section-fixed d-flex align-items-center">
    <div class="container">
      <div class="row waypoint">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="text-light p-2 text-center waypoint">
            <h1 class="display-5 fw-normal mb-4 font-monospace">Users</h1>
            <p class="fs-3 counter" data-target="<?= $userRseult[0]->id ?>"><?= $userRseult[0]->id ?></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="text-light p-2 text-center single-counter">
            <h1 class="display-5 fw-normal mb-4 font-monospace">Category</h1>
            <p class="fs-3 counter" data-target="<?= $catResult[0]->id ?>"><?= $catResult[0]->id ?></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="text-light p-2 text-center single-counter">
            <h1 class="display-5 fw-normal mb-4 font-monospace">Questions</h1>
            <p class="fs-3 counter" data-target="<?= $quizResult[0]->id ?>"><?= $quizResult[0]->id ?></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="text-light p-2 text-center single-counter">
            <h1 class="display-5 fw-normal mb-4 font-monospace">Teachers</h1>
            <p class="fs-3 counter" data-target="<?= $teacherResult[0]->id ?>"><?= $teacherResult[0]->id ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- main end -->
<!-- start footer -->
<script src="Assets/js/counter.js"></script>
<?php include_once 'pages/user/common/footer.php' ?>