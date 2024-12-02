<?php
if (!$auth->authRole('admin')) {
    header('location:dashboard?page=404');
    die;
}
?>
<h3 class="font-monospace mt-3">Dashboard->admin</h3>