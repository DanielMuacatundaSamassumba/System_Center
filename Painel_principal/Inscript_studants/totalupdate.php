<?php 
require("../../DB_content/system.php");
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
 if(isset($_POST["nome"], $_POST["sobrenome"], $_POST["curso"], $_POST["file"],$_POST["bilhete"], $_POST["idu"])){
   $system= new system();
    $system->nome_curso=$_POST["curso"];
    $system->Id_Course();

    foreach ($system->id as $row){
 $id_conetnt=$row->ID;
}
$system->Bi_number_studant=$_POST["bilhete"];


$system->Nome_studant=$_POST["nome"];
$system->sobrenome_studant=$_POST["sobrenome"];
$system->foto_studant=$_POST["file"];
$system->id= $id_conetnt;
$system->update_s($_POST["idu"]);

echo "<script>alert('Estudante Cadastrado com Sucesso!')</script>";
header("Location:index.php");   
}