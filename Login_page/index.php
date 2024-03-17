<?php 
require("../DB_content/system.php");
if(isset($_POST["email"], $_POST["Password"])){
     $password=$_POST["Password"];
     $email =$_POST["email"];
    $system = new system();
     $system->email=$_POST["email"];
     $system->password=$_POST["Password"];
 

    foreach($system->Auth_login() as $each){
        $password_cript = $each->Palavra_passe;
    }
     if(!empty( $password_cript)){
        if(password_verify( $password,$password_cript)){
            session_start();
            $_SESSION["email_user"]=$_POST["email"];
           
            header("location:http://localhost/system_center/Painel_principal/Deshboard/");
          }else{
              echo "<div style='background-color:#fff;padding:8px;'><h3>Email ou password Incorreta!</h3></div>";
          }
     }else{
        echo "<div style='background-color:#fff;padding:8px;'><h3>Conta não Cadastrada!</h3></div>";
     }



    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./../fontawesome-free-6.5.1-web/css/all.css">
</head>
<body>
    <div class="container">
        <div class="content-form">
            <img src="./../Images/logo.png" alt="">
            <h3>Seja Benvindo!</h3>
            <form method="post">
               <div class="input_email">
               <i class="fa-solid fa-envelope"></i> <input type="email" placeholder="Email" name="email">
               </div>
                <div class="input_password">
                    <i class="fa-solid fa-lock"></i> <input type="password" placeholder="Password" name="Password">
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