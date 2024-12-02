<?php
if (!$auth->authRole('teacher')) {
    header('location:dashboard?page=404');
    die;
}
$type = new QuizType;
$rows = $type->index();

if (isset($_POST['sub']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $type->add($_POST['frm']);
}
if (isset($_POST['updateSub']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $type->updata($_POST['type'], $_POST['id']);
}
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
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=quiztype') ?>" method="post">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Title</label>
                            <input name="frm[type]" type=" text" class="form-control">
                        </div>
                        <input name="sub" type="submit" value="Add" class="btn btn-success w-100">
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
                <?php $x = 1;
                foreach ($rows as $row):
                ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $row->type ?></td>
                        <td>
                            <button onclick='update(<?= $row->tId ?>);' class='btn btn-info' popovertarget='typeUp' id='showTypeUp'>Update</button>
                            <!-- type update pop div start-->
                            <div id="typeUp" popover class="pop">
                                <div class="pop-content">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">Update quiz type.
                                            <button id="closeTypeUp" class="btn"><i class=" fa fa-close"></i></button>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-around">
                                                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=quiztype') ?>" method="post">
                                                    <div id="form"></div>
                                                    <input name="updateSub" type="submit" value="Update" class="btn btn-success w-100">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button onclick='pop("dashboard?page=deleteQuizType&tid=<?= $row->tId ?>","Quiz type")' popovertarget='my' id='showBtn' class='btn btn-danger'>Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function update(id) {
        $.ajax({
            type: 'POST',
            url: 'pages/admin/ajax/quizType.php',
            data: {
                id: id
            },

            success: (data) => {
                $('#form').html(data);
            },
            error: (e) => {
                console.log(e);
            }
        })
    }
</script>