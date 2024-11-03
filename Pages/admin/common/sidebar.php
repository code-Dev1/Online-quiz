<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav mt-4">
                <a class="nav-link <?= $active ?>" href="dashboard">
                    <div class="sb-nav-link-icon"><i class="fa fa-tachometer"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'dashboard') ? 'active' : '' ?>" href=" dashboard?page=dashboard">
                    <div class="sb-nav-link-icon"><i class="fa fa-tachometer"></i></div>
                    Dashboard->admin
                </a>
                <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'score') ? 'active' : '' ?>" href="dashboard?page=score">
                    <div class="sb-nav-link-icon"><i class="fa fa-soccer-ball-o"></i></div>
                    Score
                </a>
                <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'rank') ? 'active' : '' ?>" href="dashboard?page=rank">
                    <div class="sb-nav-link-icon"><i class="fa fa-level-up"></i></div>
                    Rank
                </a>

                <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'profile') ? 'active' : '' ?>" href="dashboard?page=profile">
                    <div class="sb-nav-link-icon"><i class="fa fa-exchange"></i></div>
                    Profile
                </a>
                <a class="nav-link <?= (isset($_GET['page']) && ($_GET['page'] == 'quizzes' || $_GET['page'] == 'viewquestion' || $_GET['page'] == 'updatequestion')) ? 'active' : '' ?>" href="dashboard?page=quizzes">
                    <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                    Quizzes
                </a>
                <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'quizcatagory') ? 'active' : '' ?>" href="dashboard?page=quizcatagory">
                    <div class="sb-nav-link-icon"><i class="fa fa-tasks"></i></div>
                    Catagory
                </a>
                <a class="nav-link  <?= (isset($_GET['page']) && $_GET['page'] == 'quiztype') ? 'active' : '' ?>" href="dashboard?page=quiztype">
                    <div class="sb-nav-link-icon"><i class="fa fa-check-circle-o"></i></div>
                    Quiz Type
                </a>
                <a class="nav-link  <?= (isset($_GET['page']) && ($_GET['page'] == 'message' || $_GET['page'] == 'viewmessage')) ? 'active' : '' ?>" href="dashboard?page=message">
                    <div class="sb-nav-link-icon"><i class="fa fa-chain"></i></div>
                    Message /Feedback
                    <span class="badge bg-danger ms-2">4</span>
                </a>
                <a class="nav-link" href="dashboard?page=">
                    <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                    Logout
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Shahzada
        </div>
    </nav>
</div>