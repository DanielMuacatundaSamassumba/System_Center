<?php
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
require("../../DB_content/system.php");
 $system = new system();
$teachers=$system->All_teachers();
 $course=$system->Todos_cursos();
  if(isset($_POST["nome"], $_POST["sobrenome"],$_POST["bi_number"], $_POST["curso"], $_POST["file"])){
    $system->nome_curso=$_POST["curso"];
    $system->Id_Course();

    foreach ($system->id as $row){
 $id_conetnt=$row->ID;
}
$system->Bi_number_studant=$_POST["bi_number"];

if(!$system->validation_bi_T()){
    $count_t_M=count($system->Validation_teacher());
    $count_t_T= count($system->Validation_teacher_T());
    if(!$count_t_T==1 || !$count_t_M==1){  
            $system->Nome_studant=$_POST["nome"];
            $system->sobrenome_studant=$_POST["sobrenome"];
            $system->foto_studant=$_POST["file"];
            $system->id= $id_conetnt;
            $system->insert_T();
            echo "<script>alert('Formador Cadastrado com Sucesso!')</script>";
    }else{
        echo "<script>alert('O Curso já está ser lecionado Por outro Formador!')</script>";
    }  
    }else{
    echo "<script>alert('Bilhete de Identidade já cadastrado!')</script>";
}
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incrição</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./../../fontawesome-free-6.5.1-web/css/all.css">

</head>

<body>
    <div class="container">
        <div class="content-first">
            <aside>
                <div class="logo">
                    <img src="./../../Images/logo.png" alt="">
                </div>
                <ul>
                <div>
                    <a href="./../Deshboard/index.php" class="i"><i class="fa-solid fa-house"></i></a> <li><a href="./../Deshboard/index.php" > Dashboard</a></li>

                </div>
                    <div>
                        <a href="../Inscription_Alunos/index.php" class="i"><i class="fa-solid fa-user-group"></i> </a>  <li><a href="../Inscription_Alunos/index.php"> Inscrição</a></li>
                    </div>
                    <div>
                       <a href="../Course/index.php" class="i"> <i class="fa-solid fa-graduation-cap"></i> </a> <li><a href="../Course/index.php"> Cursos</a></li>
                    </div>
                   <div>
                   <a href="../Inscript_studants/index.php" class="i"> <i class="fa-solid fa-list"></i></a>   <li><a href="../Inscript_studants/index.php"> Inscritos</a></li>
                   </div>
                   <div>
                   <a href="../Teachers/index.php" class="i"> <i class="fa-solid fa-user-group"></i></a>  <li><a  href="../Teachers/index.php"></i>Formadores</a></li>
                   </div>
                    <div>
                       <a href="../Settings/index.php" class="i"> <i class="fa-solid fa-gear"></i></a> <li><a  href="../Settings/index.php"> Configurações</a></li>
                    </div>
                   <div>
                    <a href="../sign_off.php" class="i"><i class="fa-solid fa-right-from-bracket"></i></a> <li><a href="../sign_off.php"> Sair</a></li>
                   </div>


                </ul>
            </aside>
        </div>
        <div class="content-second">
            <div class="top-line">
                <h3>Formadores</h3> <img src="./../../Images/logo.png" alt="" srcset="">
            </div>
            <div class="content-form">
                <h2>Cadastro de Formador</h2>
                <form method="post">
                    <div class="inputs_first">
                        <input required type="text" placeholder="Nome" name="nome">
                        <input required type="text" placeholder="Sobrenome" name="sobrenome">
                        <input required type="text" placeholder="Bilhete de Identidade" name="bi_number">
                    </div>
                    <div class="inputs_second">
                        <input type="text" placeholder="Cursos" class="Curso" name="curso" required>
                        <ul>
                           <?php foreach($course as $row):?>
                           <li onclick="Add_input('<?php echo $row->Nome_curso ?>')"><?php echo $row->Nome_curso ?></li>
                           <?php endforeach; ?>
                        </ul>
                        <div class="input_file">
                            <input type="file" name="file" id="file" onchange="show_prev()" required value="./logo.png">
                            <div class="preve_img">
                                <img src="./logo.png" alt="">
                                <label for="file">Selecionar Foto</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit">Inscrever</button>
                </form>
            </div>
            <div class="tables-content">
                <div class="table">
                    <table>
                        <thead>
                            <th>Nome</th>
                            <th>Turno</th>
                            <th> Turma</th>
                            <th> Curso</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                        </thead>
                        <tbody>
                              <?php foreach($teachers as $row):?> 
                            <tr>
                                <td><?php echo  $row->Nome." ".$row->Sobrenome?></td>
                                <td><?php echo  $row->Turno?></td>
                                <td><?php echo  $row->Turma?></td>
                              <td><?php echo  $row->Nome_curso?></td>
                                <td> <a href="update.php?idu=<?php echo  $row->ID_formador?>"><i class="fa-solid fa-edit"></i></a>  </td>
                              <td> <a href="delete.php?id=<?php echo  $row->ID_formador?>"><i class="fa-solid fa-trash"></i></a> </td>
                            </tr>
                            <?php endforeach;?> 
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>