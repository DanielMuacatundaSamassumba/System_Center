<?php 
require("../../../DB_content/system.php");
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
$system= new system();


 if(isset($_POST["nome"], $_POST["sobrenome"], $_POST["bi_number"], $_POST["file"])){
    $system->email=$_SESSION["email_user"];
    foreach($system->getID_use() as $row){
        $id = $row->ID;
    }
    
    $system->Nome=$_POST["nome"];
    $system->sobrenome=$_POST["sobrenome"];
    $system->Bi_number= $_POST["bi_number"];
    $system->foto=$_POST["file"];
    $system->id=$id;
    $system->update_us();
    header("Location:../index.php");
 }