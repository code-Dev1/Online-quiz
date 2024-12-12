<?php
if (!$auth->authRole('admin')) {
    header('location:dashboard?page=404');
    die;
}
if (isset($_GET['uid'])) {
    if (!empty($_GET['uid'])) {
        $id = $_GET['uid'];
        $user = new User;
        $quiz->deleteById($id);
    } else {
        Semej::set('danger', '', 'User id not set.');
        header('location:dashboard?page=quizzes');
        die;
    }
} else {
    Semej::set('danger', '', 'User id not set.');
    header('location:dashboard?page=quizzes');
    die;
}
