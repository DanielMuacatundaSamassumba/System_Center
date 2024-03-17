<?php
require("../../DB_content/system.php");
session_start();
if(!$_SESSION["email_user"]){
    header("location:../../login_page/index.php");
    exit;
}
$system = new system();
$system->id=$_GET["idu"];
$datas=$system->Updt_course();
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
            <h3>Actualização de Cursos</h3>  <img src="./../../Images/logo.png" alt="" srcset="">
            </div>
            <div class="container_2">
                <div class="content-form">
                    <img src="./../Images/logo.png" alt="">
                    <h3>Actualização de Cursos</h3>
                    <form class="form" method="post" Action="updt.php">
                         <?php foreach($datas as $row): ?>
                        <div class="first_data">
                           <input required type="text" placeholder="Nome do Curso" class="email_1" name="nome" value="<?php echo $row->Nome_curso ?>">
                            <div class="radios">
                                <div class="radios_sun">
                                    <input type="radio" name="turno" value="M">
                                    <input type="radio" name="turno" value="T">
                                </div>
                                <h5>Manhã</h5>
                                <h5>Tarde</h5>
                            </div
                            <p id="caracteres"></p>
        
                        </div>
                        <div class="second_data">
                        
                                 <input required type="text" placeholder="Turma" class="email_2" name="turma" value="<?php echo $row->Turma ?>">
        
                       
                         
                                <input required type="number" placeholder="Preço do Curso" class="Password_2" name="preco" value="<?php echo $row->preco ?>">
        
                        
                        </div>
                        <?php endforeach;?>
                    <div class="btn">
                        <button>Entrar</button>
                    </div>
                    <input style="display:none" type="text" name="id" value="<?php echo $_GET["idu"] ?>">
                    </form>
                </div>
            </div>
         
        
     <script src="script.js"></script>
</body>
</html>