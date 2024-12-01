<?php
$user = new User;

if (isset($_GET['uid'])) {
    if (!empty($_GET['uid'])) {
        $id = $_GET['uid'];
        $row = $user->singleById($id);
        $roles = $user->role();
    } else {
        Semej::set('danger', '', 'User id not set please try agin later.');
        header('location:dashboard?page=users');
        die;
    }
} else {
    Semej::set('danger', '', 'User id not set please try agin later.');
    header('location:dashboard?page=users');
    die;
}

if (isset($_POST['sub']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->updateById($_POST['frm'], $id);
}
?>
<h3 class="font-monospace mt-3">Updata profile</h3>
<div class="border rounded-3 my-4">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=updateUser&uid=' . $id) ?>" method="POST">
        <div class="row justify-content-center m-sm-5 m-3">
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Full Name</label>
                <input name="frm[name]" value="<?= $row->fullName ?>" type="text" class="form-control" placeholder="Full Name">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Username</label>
                <input name="frm[userName]" value="<?= $row->userName ?>" type="text" class="form-control" placeholder="Username">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Email</label>
                <input name="frm[email]" value="<?= $row->email ?>" type="text" class="form-control" placeholder="Email">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Country</label>
                <input name="frm[country]" value="<?= $row->country ?>" type="text" class="form-control" placeholder="Country">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Role</label>
                <select name="frm[role]" id="chooseCatagory" class="form-select">
                    <option value="">Select user role</option>
                    <?php foreach ($roles as $val): ?>
                        <option <?= ($val == $row->role) ? 'selected' : '' ?> value="<?= $val ?>"><?= $val ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input name="sub" type="submit" class="btn btn-success" value="Update">
        </div>
    </form>
</div>