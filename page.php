<?php
if(!isset($_SESSION)){
  session_start();
}

 $role = $_SESSION['auth_user']['role'];
 if ($role == 'user') {

   header('location:dashboard?page=home');
   die;
 }
 elseif ($role == 'admin') {

   header('location:dashboard?page=dashboard');
   die;
 }
  elseif($role == 'teacher') {
   header('location:dashboard?page=dashboard-teacher');
   die;
 }