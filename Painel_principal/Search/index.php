<?php
require("../../DB_content/system.php");
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
$system = new system();
$system->Bi_number_studant = $_POST["bi_number"];
$data = $system->search_s();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
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
                <h3>Resultado de Pesquisa</h3> <img src="./../../Images/logo.png" alt="" srcset="">
            </div>
            <div class="content-form">
                <h2>Ficha de Inscrição</h2>
                <form action="">
                    <?php foreach ($data as $row): ?>
                        <div class="inputs_first">
                            <img src="../Images/<?php echo $row->Foto ?>" alt="fggt">

                        </div>
                        <div class="inputs_second">

                            <h4> Nome:
                                <?php echo $row->Nome . " " . $row->Sobrenome ?>
                            </h4>
                            <h4> Curso:
                                <?php echo $row->Nome_curso ?>
                            </h4>
                            <h4>Turno:
                                <?php echo $row->Turno ?>
                            </h4>
                            <h4>B.I:
                                <?php echo $row->Bi_number ?>
                            </h4>

                        </div>

                        <div class="content-Action">
                            <a href="../Inscript_studants/update.php?idu=<?php echo $row->ID_aluno ?>"> <i
                                    class="fa-solid fa-edit"></i></a>
                            <a href="../Inscript_studants/delete.php?id=<?php echo $row->ID_aluno ?>"> <i
                                    class="fa-solid fa-trash"></i></a>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>