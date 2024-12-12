<?php
if (!$auth->authRole('teacher')) {
    header('location:dashboard?page=404');
    die;
}
$quiz = new Quizzes;
$rows = $quiz->index();
?>

<h3 class="font-monospace mt-3">Quizzes</h3>
<a href="dashboard?page=addquestion" class="btn btn-info mt-3">Add Question</a>
<!-- write content between this div -->
<div class="border rounded-3 my-4">
    <div class="mx-md-5">

        <table class="table table-responsive my-4">
            <thead>
                <th>#NO</th>
                <th>Question</th>
                <th>Catagory</th>
                <th>Question Type</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $x = 1;
                foreach ($rows as $row):
                ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $row->question ?></td>
                        <td><span class="badge bg-primary fs-6"><?= $row->title ?></span></td>
                        <td><span class="badge bg-success fs-6"><?= $row->type ?></span></td>
                        <td>
                            <a href="dashboard?page=viewquestion&qid=<?= $row->qId ?>" class="btn btn-success">View</a>
                            <a href="dashboard?page=updatequestion&qid=<?= $row->qId ?>" class="btn btn-info">Update</a>
                            <button onclick="pop('dashboard?page=deleteQuestion&qid=<?= $row->qId ?>','question')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-center w-100">
    <nav aria-label="..." class="">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link"><i class="fa fa-angle-left"></i></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
            </li>
        </ul>
    </nav>
</div>