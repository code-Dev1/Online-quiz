<?php
$user = new User;
$rows = $user->index();
if (isset($_POST['sub']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->add($_POST['frm']);
}
?>
<h3 class="font-monospace mt-3">Users</h3>
<button onclick="getRole()" class="btn btn-info mt-3" popovertarget="inputPop" id="showBtnInput">Add user</button>
<div id="inputPop" popover class="pop">
    <div class="pop-content">
        <div class="card">
            <div class="card-header d-flex justify-content-between">Add new user
                <button id="closeBtnInput" class="btn"><i class=" fa fa-close"></i></button>
            </div>
            <div class="card-body">
                <div class="row justify-content-around">
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=users') ?>" method="post">
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Full Name</label>
                            <input name="frm[name]" type=" text" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">User Name</label>
                            <input name="frm[userName]" type=" text" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Email</label>
                            <input name="frm[email]" type="email" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Country</label>
                            <input name="frm[country]" type="text" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Password</label>
                            <input name="frm[password]" type="text" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Confirm</label>
                            <input name="frm[confirm]" type="text" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="" class="input-group-text">Role</label>
                            <select name="frm[role]" id="chooseCatagory" class="form-select role" required>

                            </select>
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
                <th>#</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $x = 1;
                foreach ($rows as $row):
                ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $row->fullName ?></td>
                        <td><?= $row->userName ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->role ?></td>
                        <td>
                            <a href="dashboard?page=viewUser&uid=<?= $row->uId ?>" class="btn btn-success">View</a>
                            <a href="dashboard?page=updateUser&uid=<?= $row->uId ?>" class="btn btn-info">Update</a>
                            <button onclick="pop('dashboard?page=deleteUser&uid=<?= $row->uId ?>','question')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
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
<script>
    const getRole = () => {
        $.ajax({
            type: "POST",
            url: "pages/admin/ajax/userRole.php",
            success: (data) => {
                $('.role').html(data)
            }
        });
    }
</script>