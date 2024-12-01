<?php
if (isset($_GET['cid'])) {
    if (!empty($_GET['cid'])) {
        $id = $_GET['cid'];
        $catagory = new Catagory;
        $catagory->delete($id);
    } else {
        Semej::set('danger', '', 'Catagory id not set.');
        header('location:dashboard?page=quizcatagory');
        die;
    }
} else {
    Semej::set('danger', '', 'Catagory id not set.');
    header('location:dashboard?page=quizcatagory');
    die;
}
