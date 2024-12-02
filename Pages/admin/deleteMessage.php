<?php
if (!$auth->authRole('admin')) {
    header('location:dashboard?page=404');
    die;
}
if (isset($_GET['mid'])) {
    if (!empty($_GET['mid'])) {
        $id = $_GET['mid'];
        $message = new Message;
        $message->delete($id);
    } else {
        Semej::set('danger', '', 'Message id not set.');
        header('location:dashboard?page=message');
        die;
    }
} else {
    Semej::set('danger', '', 'Message  id not set.');
    header('location:dashboard?page=message');
    die;
}
