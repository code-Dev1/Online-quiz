<?php
if (isset($_GET['mid'])) {
    if (!empty($_GET['mid'])) {
        $id = $_GET['mid'];
        $message = new Message;
        $row = $message->single($id);
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
<h3 class="font-monospace mt-3">Profile</h3>

<div class="border rounded-3 my-4">
    <div class="p-4">
        <table class="table table-responsive table-bordered">
            <tr>
                <td><b class="p-4">Sender name</b></td>
                <td><?= $row->senderName ?></td>
            </tr>
            <tr>
                <td><b class="p-4">Sender Email</b></td>
                <td><?= $row->senderEmail ?></td>
            </tr>
            <tr>
                <td><b class="p-4">Message</b></td>
                <td><?= $row->message ?></td>
            </tr>
            <tr>
                <td><b class="p-4">Sand Date</b></td>
                <td><?= dates($row->create_at) ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center m-3">
    <button onclick="pop('dashboard?page=deleteMessage&mid=<?= $row->mId ?>','message')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete message</button>
</div>