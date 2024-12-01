<?php
$quiz = new Quizzes;
if (isset($_GET['qid'])) {
    if (!empty($_GET['qid'])) {
        $id = $_GET['qid'];
        $ans = new Answer;
        $type = new QuizType;
        $catagory = new Catagory;
        $row = $quiz->show($id);
        $answers = $ans->single($id);
        $catR = $catagory->index();
        $typeR = $type->index();
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
if (isset($_POST['sub']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST['frm'], $_POST['answer'], $_POST['id']);
    // die;
    $quiz->update($_POST['frm'], $_POST['answer'], $_POST['id']);
}
?>
<h3 class="font-monospace mt-3">Update question</h3>
<!-- <p>first change data after update if befor change data you can't update</p> -->
<div class="border rounded-3 my-4">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=updatequestion&qid=' . $id) ?>" method="POST">
        <div class="row justify-content-center m-3">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Question</label>
                <input value="<?= $row->question ?>" name="frm[question]" type="text" class="form-control" placeholder="Question">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Crrect Answer</label>
                <input value="<?= $row->correctAnswer ?>" name="frm[correct]" type="text" class="form-control" placeholder="Crrect Answer">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Time limit</label>
                <input value="<?= $row->timeLimit ?>" name="frm[time]" type="text" class="form-control" placeholder="Time limit">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Country</label>
                <select name="frm[catagoryId]" id="chooseCatagory" class="form-select">
                    <option value="">Choose question catagory</option>
                    <?php foreach ($catR as $cat): ?>
                        <option <?= ($cat->cId == $row->catagoryId) ? 'selected' : '' ?> value="<?= $cat->cId ?>"><?= $cat->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Type</label>
                <select name="frm[typeId]" id="chooseCatagory" class="form-select">
                    <option value="">Choose question type</option>
                    <?php foreach ($typeR as $type): ?>
                        <option <?= ($type->tId == $row->typeId) ? 'selected' : '' ?> value="<?= $type->tId ?>"><?= $type->type ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
            <h5 class="font-monospace">Answers</h5>
            <div class="border rounded-3 mb-3">
                <div class="row px-3 pt-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text answer-label">1</label>
                            <input name="answer[answer1]" value="<?= (isset($answers[0]->answer)) ? $answers[0]->answer : '' ?>" type="text" class="form-control" placeholder="Answer">
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text answer-label">2</label>
                            <input name="answer[answer2]" value="<?= (isset($answers[1]->answer)) ? $answers[1]->answer : '' ?>" type="text" class="form-control" placeholder="Answer">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text answer-label">3</label>
                            <input name="answer[answer3]" value="<?= (isset($answers[2]->answer)) ? $answers[2]->answer : ''  ?>" type="text" class="form-control" placeholder="Answer">
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text answer-label">4</label>
                            <input name="answer[answer4]" value="<?= (isset($answers[3]->answer)) ? $answers[3]->answer : ''  ?>" type="text" class="form-control" placeholder="Answer">
                        </div>
                    </div>
                </div>
            </div>
            <input name="sub" type="submit" class="btn btn-success" value="Update">
        </div>
    </form>
</div>