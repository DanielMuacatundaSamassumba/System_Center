<?php 
require("../../DB_content/system.php");
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
$system = new system();
$system->id= $_GET["id"];
$system->Delete_course();
header("location:index.php");