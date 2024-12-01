<?php
require_once '../../../autoload.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $type = new QuizType;
    $row = $type->single($id);


    echo
    "<input value='$row->tId' type='hidden' name='id'>
    <div class='input-group mb-3'>
        <label for='' class='input-group-text'>Title</label>
        <input type='text' class='form-control' value='$row->type' name='type'>
    </div>";
}
