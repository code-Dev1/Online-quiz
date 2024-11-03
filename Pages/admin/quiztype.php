<?php
// var_dump(update('type', 2));
// die;
?>
<h3 class="font-monospace mt-3">Quiz Type</h3>
<button class="btn btn-info mt-3" popovertarget="inputPop" id="showBtnInput">Add quiz Type</button>
<div id="inputPop" popover class="pop">
    <div class="pop-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between">Add new quiz type.
                <button id="closeBtnInput" class="btn"><i class=" fa fa-close"></i></button>
            </div>
            <div class="card-body">
                <div class="row justify-content-around">
                    <form action="">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <input type="submit" value="Add" class="btn btn-success w-100">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- write content between this div -->
<div class="border rounded-3 my-4">
    <div class="mx-md-5">
        <table class="table table-responsive my-4">
            <thead>
                <th>#NO</th>
                <th>Quiz Type</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Computer</td>
                    <td>
                        <button onclick="<?php $a = update('type', 1) ?>" class="btn btn-info" popovertarget="typeUp" id="showTypeUp">Update</button>
                        <button onclick="pop('dashboard?page=quiztype&qt=22','quiz type')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>