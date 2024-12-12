<?php
if (!$auth->authRole('admin')) {
    header('location:dashboard?page=404');
    die;
}
$message = new Message;
$rows = $message->index();
?>

<h3 class="font-monospace mt-3">Message / Feedback</h3>
<div class="border rounded-3 my-4">
    <div class="mx-md-5">
        <table class="table table-responsive my-4">
            <thead>
                <th>#NO</th>
                <th>From</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $x = 1;
                foreach ($rows as $row): ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $row->senderName ?></td>
                        <td><?= $row->senderEmail ?></td>
                        <td><span class="badge <?= ($row->status == 0) ? 'bg-success' : 'bg-danger' ?> fs-6"><?= ($row->status == 0) ? 'Reded' : 'New' ?></span></td>
                        <td>
                            <a href="dashboard?page=viewMessage&mid=<?= $row->mId ?>" class="btn btn-success">View</a>
                            <button onclick="pop('dashboard?page=deleteMessage&mid=<?= $row->mId ?>','message')" popovertarget="my" id="showBtn" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>