<?php
if (isset($_POST['sub'])) {
    $user = new User;
    $user->changePass($_POST['frm']);
}
?>
<h3 class="font-monospace mt-3">Change password</h3>

<div class="border rounded-3 my-4">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=changepass') ?>" method="POST">
        <div class="row justify-content-center m-sm-5 m-3">
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Old Pass</label>
                <input name="frm[oldPass]" type="text" class="form-control" placeholder="Old Password">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">New Pass</label>
                <input name="frm[newPass]" type="text" class="form-control" placeholder="New Password">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">Conform Pass</label>
                <input name="frm[confrim]" type="text" class="form-control" placeholder="New Password">
            </div>
            <input name="sub" type="submit" class="btn btn-success" value="Change">
        </div>
    </form>
</div>