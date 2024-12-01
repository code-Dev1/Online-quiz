<?php
$user = new User;
$row = $user->single();
if (isset($_POST['sub']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->update($_POST['frm']);
}
?>
<h3 class="font-monospace mt-3">Updata profile</h3>
<div class="border rounded-3 my-4">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'] . '?page=updateprofile') ?>" method="POST">
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
            <input name="sub" type="submit" class="btn btn-success" value="Update">
        </div>
    </form>
</div>