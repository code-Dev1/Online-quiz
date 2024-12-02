<?php
include_once __DIR__ . '/autoload.php';
$auth = new Auth;

if (!$auth->validateToken()) {
    $auth->logout();die;
}
$page ='404';
$san = new Sanitizer();
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $san->sanitize($_GET['page']);
    $page = basename($page);
    $page_explode = explode('.', $page);
    $page = $page_explode[0];
    if (!file_exists("pages/admin/" . $page . ".php")) {
        $page = '404';
        // $active = 'active';
    }
} else {
    $page = '404';
    // $active = 'active';
}
$include_path = __DIR__ . '/pages/admin/' . $page . '.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Self-test | Dashboard</title>
    <link href="Assets/images/logo.png" rel="icon" />
    <link href="Assets/css/dashboardStyles.css" rel="stylesheet" />
    <link href="Assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="Assets/css/bootstrap.css" rel="stylesheet" />
    <link href="Assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="Assets/css/style.css" rel="stylesheet" />
    <script src="Assets/js/jquery.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include_once 'Pages/admin/common/topnav.php' ?>
    <div id="layoutSidenav">
        <?php include_once 'Pages/admin/common/sidebar.php' ?>
        <!-- main contect start -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- write content between this div -->
                    <?php
                    "<div class='mt-5'>" . Semej::show() . "</div>";
                    include_once $include_path ?>
                </div>
            </main>
        </div>
        <!-- main content end -->
    </div>
    <!-- pop div for delete start -->
    <div id="my" popover class="pop">
        <div class="pop-content">
            <div class="card">
                <div class="card-header d-flex justify-content-between" id="costom">
                    <button id="closeBtn" class="btn"><i class=" fa fa-close"></i></button>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <a id="durl" class="btn btn-danger">Yes delete it</a>
                        <button id="closeBtn" class="btn btn-success">No seve
                            it</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pop div for delete end -->
    <script src="Assets/js/bootstrap.min.js"></script>
    <script src="Assets/js/jquery.magnific-popup.min.js"></script>
    <script src="Assets/js/script.js"></script>
    <!-- <script src="Assets/js/main.js"></script> -->
</body>

</html>