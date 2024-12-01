<?php
if (isset($_GET['qid'])) {
    if (!empty($_GET['qid'])) {
        $id = $_GET['qid'];
        $quiz = new Quizzes;
        $quiz->delete($id);
    } else {
        Semej::set('danger', '', 'Question id not set.');
        header('location:dashboard?page=quizzes');
        die;
    }
} else {
    Semej::set('danger', '', 'Question id not set.');
    header('location:dashboard?page=quizzes');
    die;
}
