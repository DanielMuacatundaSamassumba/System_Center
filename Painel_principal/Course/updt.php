<?php
require("../../DB_content/system.php");
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
$system = new system();
 if(isset($_POST["nome"], $_POST["turno"], $_POST["turma"], $_POST["preco"],$_POST["id"])){
    $system->id=$_POST["id"];
  $system->nome_curso=$_POST["nome"];
  $system->turno_curso=$_POST["turno"];
   $system->turma_curso=$_POST["turma"];
   $system->preco_curso=$_POST["preco"];
   $system->Updt_c();
   header("location:index.php");
 }
