<?php
require 'users.php';
$u = new User; //nome criado na classe
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
   
<div id='background-color'>
 <h2>Login</h2>

<form method="POST">

 <input placeholder="Type your email" name="email" id="email-login" type="email" name="email" maxlength="30"/>

 <input placeholder="Type your password" name="password" id="password-login" type="password" name="password" maxlength="15"/>
 
 <input id="button" type="submit" value="Login"/>

 <a href="cadastrar.php"><strong>You are not register yet?</strong>&nbsp; Register</a>
 </form>
 </div>
 <?php
 if(isset($_POST["email"]))
 {
     $email = addslashes($_POST["email"]);
     $password = addslashes($_POST["password"]);

     if(!empty($email) &&!empty ($password))
    {
        $u->mysqli('project_login', 'localhost', 'root', '');
if($u->msgError==""){
    if($u->logar($email, $password))
    {
header('location: Areaprivada.php');
    }
    
else{
    ?>
    <div class='msg-erro'>Email e/ou senha inválidos</div> 
    <?php
}
}
else{
    ?>
    <div class='msg-erro'>Erro: ".$u->msgError</div>
    <?php
}
    }else{
        ?>
        <div class='msg-erro'>Preencha todos os campos</div>
        <?php
    }
 }
 ?>
 </div>
</body>
</html>