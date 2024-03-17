<?php 
require("../../DB_content/system.php");
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
                <h3>Configurações</h3> <img src="./../../Images/logo.png" alt="" srcset="">
            </div>
            <div class="content-form">
                <h2>Dados Pessoais</h2>
                <form action="">
                <?php foreach($rows as $row): ?>
                    <div class="inputs_first">
                   
                    
                     <img src="../Images/<?php echo $row->Foto?>" alt="">
                       
                       
                    </div>
                    <?php endforeach; ?>
                    <div class="inputs_second">
                    <?php foreach($rows as $row): ?>
                        <h4>Nome:<?php echo $row->Nome."  ".$row->Sobrenome ?></h4>
                        <h4>B.I: <?php echo $row->Bi_number ?></h4>
                        <?php endforeach; ?>
                    </div>
                  
  <div class="content-Action">
   <a href="./Personal_datas/index.php"> <i class="fa-solid fa-edit"></i></a>
  
  </div>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>