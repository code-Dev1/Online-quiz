<?php
if (!$auth->authRole('teacher')) {
    header('location:dashboard?page=404');
    die;
}
$catagory = new Catagory;
$catResult = $catagory->index();
$type = new QuizType;
$typeResult = $type->index();
if (isset($_POST['sub'])) {
    $quiz = new Quizzes;
    $formData = $_POST['frm'];
    $formAnswer = $_POST['answer'];
    $quiz->add($formData, $formAnswer);
}
?>
<h3 class="font-monospace mt-3">Add Question</h3>
<div class="border rounded-3 my-4">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=addquestion') ?>" method="POST">
        <div class="row justify-content-center m-3">
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Question</label>
                <input name="frm[question]" type="text" class="form-control" placeholder="Question" required>
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Correct Answer</label>
                <input name="frm[Crrect]" type="text" class="form-control" placeholder="Crrect Answer" required>
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Time limit</label>
                <input name="frm[time]" type="text" class="form-control" placeholder="Time limit" required>
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Country</label>
                <select name="frm[catagory]" id="chooseCatagory" class="form-select" required>
                    <option value="">Choose question catagory</option>
                    <?php foreach ($catResult as $row): ?>
                        <option value="<?= $row->cId ?>"><?= $row->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Type</label>
                <select name="frm[type]" id="chooseCatagory" class="form-select" required>
                    <option value="">Choose question type</option>
                    <?php foreach ($typeResult as $row): ?>
                        <option value="<?= $row->tId ?>"><?= $row->type ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <h5 class="font-monospace">Answers</h5>
            <div class="border rounded-3 mb-3">
                <div class="row px-3 pt-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text answer-label">1</label>
                            <input name="answer[answer1]" type="text" class="form-control" placeholder="Answer" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text answer-label">2</label>
                            <input name="answer[answer2]" type="text" class="form-control" placeholder="Answer" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text answer-label">3</label>
                            <input name="answer[answer3]" type="text" class="form-control" placeholder="Answer">
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text answer-label">4</label>
                            <input name="answer[answer4]" type="text" class="form-control" placeholder="Answer">
                        </div>
                    </div>
                </div>
            </div>
            <input name="sub" type="submit" class="btn btn-success" value="Add">
        </div>
    </form>
</div>