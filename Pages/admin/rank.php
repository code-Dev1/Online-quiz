<?php
if (!$auth->authRole('user')) {
    header('location:dashboard?page=404');
    die;
}
$score = new UserAnswer;
$rows = $score->topUsers();
?>
<h3 class="font-monospace mt-3">My rank</h3>
<!-- write content between this div -->
<div class="border rounded-3 my-4">
    <div class="mx-md-5">
        <table class="table table-responsive my-4">
            <thead>
                <th>#NO</th>
                <th>User</th>
                <th>Cuntry</th>
                <th>Score</th>
                <th>Date</th>
            </thead>
            <tbody>
                <?php $x = 1;
                foreach ($rows as $row): ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $row->fullName ?></td>
                        <td><?= $row->country ?></td>
                        <td><?= $row->scores ?></td>
                        <td><?= dates($row->date) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="bg-success text-light">
                    <td>YOU > 99</td>
                    <td>Amir</td>
                    <td>Afghanistan</td>
                    <td>400</td>
                    <td>2040-10-11</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>