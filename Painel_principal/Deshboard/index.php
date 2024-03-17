<?php
require("../../DB_content/system.php");
session_start();
if (!$_SESSION["email_user"]) {
    header("location:../../login_page/index.php");
    exit;
}
$system = new system();

if (empty(count($system->All_teachers()))) {
    $count_teachers = 0;
} else {
    $count_teachers = count($system->All_teachers());
}

if (empty(count($system->Todos_cursos()))) {
    $count_course = 0;
} else {
    $count_course = count($system->Todos_cursos());
}
$all = $system->AllMoney();
// print($all[0]);
foreach ($all as $row) {
    $number = $row;
    foreach ($number as $number_2) {
        if (empty($number_2)) {
            $row = "0";
        } else {
            $row = $number_2;
        }

    }
}

$data = date("d/m/y");
$system->data = $data;
$rows = $system->Resume_s();
$couse_resume = $system->Coure_S();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                        <a href="./../Deshboard/index.php" class="i"><i class="fa-solid fa-house"></i></a>
                        <li><a href="./../Deshboard/index.php"> Dashboard</a></li>

                    </div>
                    <div>
                        <a href="../Inscription_Alunos/index.php" class="i"><i class="fa-solid fa-user-group"></i> </a>
                        <li><a href="../Inscription_Alunos/index.php"> Inscrição</a></li>
                    </div>
                    <div>
                        <a href="../Course/index.php" class="i"> <i class="fa-solid fa-graduation-cap"></i> </a>
                        <li><a href="../Course/index.php"> Cursos</a></li>
                    </div>
                    <div>
                        <a href="../Inscript_studants/index.php" class="i"> <i class="fa-solid fa-list"></i></a>
                        <li><a href="../Inscript_studants/index.php"> Inscritos</a></li>
                    </div>
                    <div>
                        <a href="../Teachers/index.php" class="i"> <i class="fa-solid fa-user-group"></i></a>
                        <li><a href="../Teachers/index.php"></i>Formadores</a></li>
                    </div>
                    <div>
                        <a href="../Settings/index.php" class="i"> <i class="fa-solid fa-gear"></i></a>
                        <li><a href="../Settings/index.php"> Configurações</a></li>
                    </div>
                    <div>
                        <a href="../sign_off.php" class="i"><i class="fa-solid fa-right-from-bracket"></i></a>
                        <li><a href="../sign_off.php"> Sair</a></li>
                    </div>

                </ul>
            </aside>
        </div>
        <div class="content-second">
            <div class="top-line">

                <h3>Dashboard</h3> <img src="./../../Images/logo.png" alt="" srcset="">
            </div>
            <div class="Resume-content">
                <div>
                    <span>
                        <h2>
                            <?= $count_teachers ?>
                        </h2>
                        <p>Formadores</p>
                    </span> <i class="fa-solid fa-user-group"></i>
                </div>
                <div> <span>
                        <h2>
                            <?= $count_course ?>
                        </h2>
                        <p>Cursos</p>
                    </span> <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div> <span>
                        <h2>
                            <?php echo "$ " . "$row"; ?>
                        </h2>
                        <p>Total arrecadado</p>
                    </span> <i class="fa-solid fa-user-group"></i></div>
            </div>
            <div class="tables-content">
                <div class="table">
                    <table>
                        <thead>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Curso</th>

                        </thead>
                        <tbody>
                            <?php foreach ($rows as $row): ?>
                                <tr>
                                    <td><img src="./../../Images/<?= $row->Foto ?>" alt=""></td>
                                    <td>
                                        <?php echo $row->Nome . " " . $row->Sobrenome ?>
                                    </td>
                                    <td><?= $row->Nome_curso ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="content-resume-curse">
                    <table>
                        <thead>
                            <th>Curso</th>
                            <th>Preço do Curso</th>
                        </thead>
                        <tbody>
                            <?php foreach ($couse_resume as $row): ?>
                                <tr>
                                    <td>
                                        <?php echo $row->Nome_curso ?>
                                    </td>
                                    <td>
                                        <?php echo $row->preco . " Kz"; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="./script.js"></script>
</body>

</html>