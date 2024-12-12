<?php
// $role = $_SESSION['auth_user']['role'];
// var_dump($role);die;
if (!$auth->authRole("teacher")) {
    header('location:dashboard?page=404');
    die;
}
?>
<h3>teacher dashboard</h3>