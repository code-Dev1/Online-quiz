<?php
if (!$auth->authRole('teacher')) {
    header('location:dashboard?page=404');
    die;
}
if (isset($_GET['tid'])) {
    if (!empty($_GET['tid'])) {
        $id = $_GET['tid'];
        $type = new QuizType;
        $type->delete($id);
    } else {
        Semej::set('danger', '', 'Quiz type id not set.');
        header('location:dashboard?page=quiztype');
        die;
    }
} else {
    Semej::set('danger', '', 'Quiz type id not set.');
    header('location:dashboard?page=quiztype');
    die;
}
