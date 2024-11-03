<?php
include_once __DIR__ . '/autoload.php';
$san = new Sanitizer();
$page = 'home';
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $san->sanitize($_GET['page']);
    $page = basename($page);
    $page_explode = explode('.', $page);
    $page = $page_explode[0];
    if (!file_exists("pages/admin/" . $page . ".php")) {
        $page = 'home';
        $active = 'active';
    }
} else {
    $page = 'home';
    $active = 'active';
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
                    <?php include_once $include_path ?>
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
    <!-- pop div for updata start -->
    <?php
    function update($table, $id)
    {
        $type = [];
        if ($table == 'type') {
            $type = [
                'id' => $id,
                'title' => 'title 1',
                'table' => 'type'
            ];
        } else {
            $type = [
                'id' => $id,
                'title' => 'title 2',
                'table' => 'catagory'
            ];
        }
        return $type;
    }
    ?>
    <!-- type update pop div start-->
    <div id="typeUp" popover class="pop">
        <div class="pop-content">
            <div class="card">
                <div class="card-header d-flex justify-content-between">Update quiz type.
                    <button id="closeTypeUp" class="btn"><i class=" fa fa-close"></i></button>
                </div>
                <div class="card-body">
                    <div class="row justify-content-around">
                        <form action="">
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text">Title</label>
                                <input type="text" class="form-control" value="<?= (isset($a)) ? $a['title'] : '' ?>" name="title">
                            </div>
                            <input type="submit" value="Update" class="btn btn-success w-100">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- type update pop div end-->
    <!-- catagory update pop div start-->
    <div id="catagoryUp" popover class="pop">
        <div class="pop-content">
            <div class="card">
                <div class="card-header d-flex justify-content-between">update quiz catagory.
                    <button id="closeCatagoryUp" class="btn"><i class=" fa fa-close"></i></button>
                </div>
                <div class="card-body">
                    <div class="row justify-content-around">
                        <form action="">
                            <div class="input-group mb-3">
                                <label for="" class="input-group-text">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="input-group mb-3">
                                <textarea name="" id="" class="form-control" placeholder="Description" rows="10"></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="title">
                            </div>
                            <input type="submit" value="Add" class="btn btn-success w-100">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- catagory update pop div end-->

    <script src="Assets/js/jquery.min.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
    <script src="Assets/js/jquery.magnific-popup.min.js"></script>
    <script src="Assets/js/script.js"></script>
    <script src="Assets/js/main.js"></script>
</body>

</html>