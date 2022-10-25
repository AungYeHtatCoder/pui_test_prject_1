<?php
session_start(); 
include("../vendor/autoload.php");

session_destroy();
unset($_SESSION['user']);
header("Location: ../login_form.php");