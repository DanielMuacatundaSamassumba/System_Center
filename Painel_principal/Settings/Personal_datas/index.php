<?php 
require("../../../DB_content/system.php");
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
 $system= new system();
 $system->email=$_SESSION["email_user"];
$rows=$system->user_D();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incrição</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="./../../../fontawesome-free-6.5.1-web/css/all.css">

</head>
<body>
    <div class="container">
        <div class="content-first">
            <aside>
                <div class="logo">
                    <img src="./../../../Images/logo.png" alt="">
                </div>
                <ul>
                <div>
                    <a href="../../../Deshboard/index.php" class="i"><i class="fa-solid fa-house"></i></a> <li><a href="../../Deshboard/index.php" > Dashboard</a></li>

                </div>
                    <div>
                        <a href="../Inscription_Alunos/index.php" class="i"><i class="fa-solid fa-user-group"></i> </a>  <li><a href="../../Inscription_Alunos/index.php"> Inscrição</a></li>
                    </div>
                    <div>
                       <a href="../Course/index.php" class="i"> <i class="fa-solid fa-graduation-cap"></i> </a> <li><a href="../../Course/index.php"> Cursos</a></li>
                    </div>
                   <div>
                   <a href="../Inscript_studants/index.php" class="i"> <i class="fa-solid fa-list"></i></a>   <li><a href="../../Inscript_studants/index.php"> Inscritos</a></li>
                   </div>
                   <div>
                   <a href="../Teachers/index.php" class="i"> <i class="fa-solid fa-user-group"></i></a>  <li><a  href="../../Teachers/index.php"></i>Formadores</a></li>
                   </div>
                    <div>
                       <a href="../Settings/index.php" class="i"> <i class="fa-solid fa-gear"></i></a> <li><a  href="../../Settings/index.php"> Configurações</a></li>
                    </div>
                   <div>
                    <a href="../sign_off.php" class="i"><i class="fa-solid fa-right-from-bracket"></i></a> <li><a href="../sign_off.php"> Sair</a></li>
                   </div>

                </ul>
            </aside>
        </div>
        <div class="content-second">
            <div class="top-line">
            <h3>Editar Dados</h3>  <img src="./../../../Images/logo.png" alt="" srcset="">
            </div>
          <div class="content-form">
             <h2>Editar Dados</h2>
            <form action="totalUpdate.php" method="post">
                 <?php foreach($rows as $row): ?>
                <div class="inputs_first">
                    <input required type="text" placeholder="Nome" name="nome" value="<?= $row->Nome?>">
                    <input required type="text"  placeholder="Sobrenome" name="sobrenome" value="<?= $row->Sobrenome?>">
                    <input required type="text" placeholder="Bilhete de Identidade" name="bi_number" value="<?= $row->Bi_number ?>">
                </div>
                <div class="inputs_second">
                  
                    <div class="input_file">
                          <input type="file" name="file" id="file" onchange="show_prev()" value="<?= $row->Foto?>">
                          <div class="preve_img">
                            <img src="../../Images/<?= $row->Foto?>" alt="">
                            <label for="file" >Selecionar Foto</label>
                          </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <button type="submit">Inscrever</button>
            </form>
          </div>
        </div>
    </div>
     <script src="script.js"></script>
</body>
</html>