<?php
require_once '../../../autoload.php';
$catagory = new Catagory;
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $result = $catagory->single($id);
    $result = $result[0];

    echo
    "<input type='hidden' name='id' value='$result->cId'>
    <div class='input-group mb-3'>
    <label for='' class='input-group-text'>Title</label>
    <input value=' $result->title' type='text' class='form-control' name='form[title]' id='title'>
</div>
<div class='input-group mb-3'>
    <textarea name='form[description]' id='description' class='form-control' placeholder='description' rows='10'>$result->description</textarea>
</div>
<div class='input-group mb-3'>
    <input type='file' id='file' class='form-control' name='file'>
</div>";
}
