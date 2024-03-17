<?php 
require("../DB_content/system.php");


 if(isset($_POST["email"], $_POST["password"])){
    $system = new system();
     $system->email = $_POST["email"];
     $system->password=$_POST["password"];
foreach($system->verify_user() as $each){
    $email_verify = $each;
}
 if(empty($email_verify)){
     $system->user_info();
     $system->users();
     echo "<div style='background-color:#fff;padding:8px;'><h3>Conta Cadastrada com Sucesso!</h3></div>";
 }else{
    echo "<div style='background-color:#fff;padding:8px;'><h3>Email já Cadastrado!</h3></div>";
 }
 
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./../fontawesome-free-6.5.1-web/css/all.css">
</head>

<body>
    <div class="container">
        <div class="content-form">
            <img src="./../Images/logo.png" alt="">
            <h3>Cadatramento</h3>
            <form class="form" method="post">
                <div class="first_data">
                    <i class="fa-solid fa-envelope"></i> <input required type="email" placeholder="Email" class="email_1" name="email">
                    <i class="fa-solid fa-lock"></i> <input required type="password" placeholder="Password" class="Password" onchange="password_validetion()" name="password">
                    <p id="caracteres"></p>

                </div>
                <div class="second_data">
                
                        <i class="fa-solid fa-envelope"></i> <input required type="email" placeholder="Confirmar Email" class="email_2">

               
                 
                        <i class="fa-solid fa-lock"></i> <input required type="password" placeholder="Confirmar Password" class="Password_2">

                
                </div>
                <div class="show_passsword">
                    <input type="checkbox" name="" id="show" onclick="show_password()"><label for="show" >Mostrar Palavra-passe</label>
                </div>
            <div class="btn">
                <button>Entrar</button>
            </div>
            </form>
        </div>
    </div>
    <script src="./script.js"></script>
</body>

</html>