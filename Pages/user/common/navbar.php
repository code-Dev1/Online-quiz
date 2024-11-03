<?php
$url = $_SERVER['PHP_SELF'];
$explodeUrl = explode('/', $url);
$url = $explodeUrl[2];
?>
<nav class="col-md-10 offset-1 navbar-brand navbar navbar-expand-lg navbar-dark fixed-top p-2 nav-color"
    data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
        <a class="navbar-brand mt-1" href="index.php" style="text-align: center; ">
            <img src="Assets/images/logo.png" width="30" class="mb-2" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-1">
                <li class="nav-item">
                    <a id="nav-bar" class="nav-link <?= ($url == 'index.php') ? 'active' : '' ?>" aria-current="page" href="index">Home</a>
                </li>
                </li>
                <li class="nav-item">
                    <a id="nav-bar" class="nav-link <?= ($url == 'contact.php') ? 'active' : '' ?>" href="contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a id="nav-bar" class="nav-link <?= ($url == 'about.php') ? 'active' : '' ?>" href="about">About</a>
                </li>
            </ul>
            <ul class="navbar-nav d-lg-flex w-100 justify-content-end">
                <li class="nav-item">
                    <a id="nav-bar" class="nav-link <?= ($url == 'signIn.php') || ($url == 'signUp.php') ? 'active' : '' ?>" href="signIn">Sign in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>