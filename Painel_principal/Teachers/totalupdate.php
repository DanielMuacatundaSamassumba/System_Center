<?php
require("../../DB_content/system.php");
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
$system = new system();
if (isset($_POST["nome"], $_POST["sobrenome"], $_POST["bi_number"], $_POST["curso"], $_POST["file"], $_POST["id"])) {
    $system->nome_curso = $_POST["curso"];
    $system->Id_Course();

    foreach ($system->id as $row) {
        $id_conetnt = $row->ID;
    }
    $system->Bi_number_studant = $_POST["bi_number"];


        $count_t_M = count($system->Validation_teacher());
        $count_t_T = count($system->Validation_teacher_T());
        if (!$count_t_T == 1 || !$count_t_M == 1) {
             $system->id_user=$_POST["id"];
            $system->Nome_studant = $_POST["nome"];
            $system->sobrenome_studant = $_POST["sobrenome"];
            $system->foto_studant = $_POST["file"];
            $system->id = $id_conetnt;
        $system->Update_T();
           
             header("Location:index.php");
             echo "<script>alert('Actualização feita com sucesso!')</script>";
        } else {
            echo "<script>alert('O Curso já está ser lecionado Por outro Formador!')</script>";
        }
}