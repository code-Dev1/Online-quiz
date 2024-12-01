<?php
require_once '../../../autoload.php';
$user = new User;
$rows =  $user->role();
$data = "<option >Select user role</option>";
foreach ($rows as $val):

    $data .= "<option value='$val'>$val</option>";

endforeach;

echo $data;
