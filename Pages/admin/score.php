<?php
if (!$auth->authRole('user')) {
    header('location:dashboard?page=404');
    die;
}
$score = new UserAnswer;
$rows = $score->index();
$totle = $score->totleScore();
$quiz = $score->totleQuiz();
$correct = $score->correctAnswers();
?>
<h3 class="font-monospace mt-3">Score</h3>
<!-- write content between this div -->
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
        <div class="card shadow bg-warning">
            <div class="card-body d-flex justify-content-between">
                <div class="fs-4">Totle score</div>
                <div class="fs-4"><?= $totle[0]->scores ?></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
        <div class="card shadow bg-primary text-light ">
            <div class="card-body d-flex justify-content-between">
                <div class="fs-4">All answered questions</div>
                <div class="fs-4"><?= $quiz[0]->id ?></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
        <div class="card shadow bg-success text-light ">
            <div class="card-body d-flex justify-content-between">
                <div class="fs-4">Correct answered questions</div>
                <div class="fs-4"><?= $correct[0]->id ?></div>
            </div>
        </div>
    </div>
</div>
<div class="border rounded-3 my-4">
    <div class="mx-md-5">
        <table class="table table-responsive my-4">
            <thead>
                <th>#NO</th>
                <th>Category</th>
                <th>Type</th>
                <th>Score</th>
                <th>Date</th>
            </thead>
            <tbody>
                <?php $x = 1;
                foreach ($rows as $row): ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $row->title ?></td>
                        <td><?= $row->type ?></td>
                        <td><?= $row->scores ?></td>
                        <td><?= dates($row->attemptDate) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-center w-100">
    <nav aria-label="..." class="">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>