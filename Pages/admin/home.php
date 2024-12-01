<?php
$score = new UserAnswer;
$cat = new Catagory;
$catRows = $cat->index();
$rows = $score->index();
?>
<h3 class="font-monospace mt-3">Dashboard</h3>
<div class="border rounded-3 my-4" style="height: 200px;">
    <div>
        <h4 class="text-center mt-1">Quiz catagories and type</h4>
        <hr>
        <form action="">
            <div class="px-4">
                <select name="frm[catagory]" id="chooseCatagory" class="form-select">
                    <option value="">Choose catagory</option>
                    <?php foreach ($catRows as $row): ?>
                        <option value="<?= $row->cId ?>"><?= $row->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="p-4 d-flex justify-content-center">
                <input name="choose" type="radio" class="btn-check" id="btn-check-outlined"
                    autocomplete="off">
                <label class="btn btn-secondary" for="btn-check-outlined" id="chooseCatagoryLable">True / False</label>
                <a href="quiz" class="btn btn-success mx-4" style="padding: 5px 35px;">Start</a>
            </div>
        </form>
    </div>
</div>
<h3 class="font-monospace mt-5">Last 5 quiz</h3>
<div class="border rounded-3 my-4">
    <div class="mx-md-5">
        <table class="table table-responsive my-4">
            <thead>
                <th>#NO</th>
                <th>catagory</th>
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