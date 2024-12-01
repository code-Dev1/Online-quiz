<?php
if (isset($_GET['uid'])) {
    if (!empty($_GET['uid'])) {
        $id = $_GET['uid'];
        $user = new User;
        $row = $user->singleById($id);
    } else {
        Semej::set('danger', '', 'Message id not set please try agin later.');
        header('location:dashboard?page=message');
        die;
    }
} else {
    Semej::set('danger', '', 'Message id not set please try agin later.');
    header('location:dashboard?page=message');
    die;
}
?>
<h3 class="font-monospace mt-3">User Profile</h3>
<div class="border rounded-3 my-4">
    <div class="p-4">
        <table class="table table-responsive table-bordered">
            <tr>
                <td><b class="p-4">Name</b></td>
                <td><?= $row->fullName ?></td>
            </tr>
            <tr>
                <td><b class="p-4">User Name</b></td>
                <td><?= $row->userName ?></td>
            </tr>
            <tr>
                <td><b class="p-4">Email</b></td>
                <td><?= $row->email ?></td>
            </tr>
            <tr>
                <td><b class="p-4">Country</b></td>
                <td><?= $row->country ?></td>
            </tr>
            <tr>
                <td><b class="p-4">Role</b></td>
                <td><?= $row->role ?></td>
            </tr>
            <tr>
                <td><b class="p-4">Create at</b></td>
                <td><?= dates($row->create_at) ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center m-3">
    <button onclick="pop('dashboard?page=deleteUser&mid=<?= $row->uId ?>','user')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete user</button>
</div>