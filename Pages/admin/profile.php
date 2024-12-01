<?php
$user = new User;
$row = $user->single();
?>
<h3 class="font-monospace mt-3">Profile</h3>

<div class="border rounded-3 my-4">
    <div class="row p-4">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <p><span class="fs-5 fw-bold">Full name : </span><?= $row->fullName ?></p>
            <p><span class="fs-5 fw-bold">Username : </span><?= $row->userName ?></p>
            <p><span class="fs-5 fw-bold">Country : </span><?= $row->country ?></p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <p><span class="fs-5 fw-bold">Email : </span><?= $row->email ?></p>
            <p><span class="fs-5 fw-bold">Role : </span><?= $row->role ?></p>
            <p><span class="fs-5 fw-bold">Created at : </span><?= dates($row->create_at)  ?></p>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="dashboard?page=changepass" class="btn btn-primary m-2">Change password</a>
        <a href="dashboard?page=updateprofile" class="btn btn-success m-2">Update profile</a>
    </div>
</div>
<h3 class="font-monospace mt-3">Delete account</h3>
<div class="border rounded-3 mb-3">
    <div class="p-4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis voluptates sunt cumque
            laudantium expedita? Sit tempore excepturi est beatae dolorum similique obcaecati. Eos,
            dicta autem aliquam possimus reprehenderit ducimus labore!</p>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <button onclick="pop('dashboard?page=deleteAcount','account')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete acount</button>
    </div>
</div>