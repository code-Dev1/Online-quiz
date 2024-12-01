<?php
if (isset($_GET['qid'])) {
    if (!empty($_GET['qid'])) {
        $id = $_GET['qid'];
        $quiz = new Quizzes;
        $ans = new Answer;
        $row = $quiz->show($id);
        $answers = $ans->single($id);
    } else {
        Semej::set('danger', '', 'Question id not set please try agin later.');
        header('location:dashboard?page=quizzes');
        die;
    }
} else {
    Semej::set('danger', '', 'Question id not set please try agin later.');
    header('location:dashboard?page=quizzes');
    die;
}

?>

<h3 class="font-monospace mt-3">Question detail</h3>
<!-- write content between this div -->
<div class="border rounded-3 my-4">
    <div class="row p-4">
        <table class="table table-responsive table-bordered">
            <tr>
                <td><b class="m-5">Question :</b></td>
                <td><?= $row->question ?></td>
            </tr>
            <tr>
                <td><b class="m-4">Correct Answer :</b></td>
                <td><?= $row->correctAnswer ?></td>
            </tr>
            <tr>
                <td><b class="m-4">Time limit :</b></td>
                <td><?= $row->timeLimit ?> m</td>
            </tr>
            <tr>
                <td><b class="m-4">Catagory :</b></td>
                <td><?= $row->title ?></td>
            </tr>
            <tr>
                <td><b class="m-4">Type :</b></td>
                <td><?= $row->type ?></td>
            </tr>
            <tr>
                <td><b class="m-4">Created at :</b></td>
                <td><?= dates($row->create_at) ?></td>
            </tr>
            <tr>
                <td><b class="m-4">Created by :</b></td>
                <td><?= $row->fullName ?></td>
            </tr>
        </table>
        <table class="table table-responsive table-bordered">
            <tr>
                <td colspan="4">
                    <div class="text-danger d-flex justify-content-center"><b>Answers</b></div>
                </td>
            </tr>
            <?php $x = 1;
            foreach ($answers as $answer): ?>

                <tr>
                    <td><b class="p-4">Answer<?= $x++ ?></td>
                    <td><?= $answer->answer ?></td>
                </tr>

            <?php endforeach ?>
        </table>
    </div>
</div>