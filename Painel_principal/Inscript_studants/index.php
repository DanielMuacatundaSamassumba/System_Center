<?php 
require("../../DB_content/system.php");
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
 $system= new system();
$all= $system->all_studant();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscritos</title>
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
            <h3>Cursos</h3>  <img src="./../../Images/logo.png" alt="" srcset="">
            </div>
            <div class="container_2">
                <div class="content-search">
                     <form action="../Search/index.php" method="post">
                        <input type="search" placeholder="Número do Bilhete" name="bi_number" required><button type="submit">Pesquisar</button>

                     </form>
                </div>
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
                           <?php foreach($all as $row): ?>
                            
                            <tr>
                                <td><?php echo $row->Nome." ".$row->Sobrenome?></td>
                                <td><?php echo $row->Turno?></td>
                                <td><?php echo $row->Turma?></td>
                                <td><?php echo $row->Nome_curso?></td>
                                <td> <a href="update.php?idu=<?php echo $row->ID_aluno?>"><i class="fa-solid fa-edit"></i></a> </td>
                              <td>  <a href="delete.php?id=<?php echo $row->ID_aluno?>"><i class="fa-solid fa-trash"></i> </a></td>
                            </tr>
                            <?php endforeach; ?>
                          
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</body>
</html>