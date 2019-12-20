<?php
require "users.php";
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
   
<div id='background-color-reg'>
 <h2>Register</h2>

<form method="POST">
<input placeholder="Type your Complete Name" id="text-register" type="text" name="name" maxlength="30"/>
 <input placeholder="Type your email" id="email-login" type="email" name="email" maxlength="40"/>
 <input placeholder="Type your telephone" id="phone-register" type="text" name="phone" maxlength="30"/>
 <input placeholder="Type your password"  id="password-login" type="password" name="password" maxlength="15"/>
 <input placeholder="Confirm password"  id="password-login" type="password" name="confpassword" maxlength="15"/>
 
 <input id="button" type="submit" value="Register"/><br/>

 </form>
 </div>

 <?php
 if(isset($_POST["name"]))
{
    $name= addslashes($_POST["name"]); //addslashes é pra garantir que não vai ter info invasora
    $_SESSION['nome'] = $_POST["name"];
    $phone= addslashes($_POST["phone"]);
    $email= addslashes($_POST["email"]);
    $password= addslashes($_POST["password"]);
    $confpassword= addslashes($_POST["confpassword"]);
    if(!empty ($name) && !empty ($phone) && !empty($email) &&!empty ($password) && !empty ($confpassword))
    {
$u->mysqli('project_login', 'localhost', 'root', '');
if($u ->msgError =="")// se estiver ok
{
    if($password == $confpassword)
    {
        if($u->cadastrar($name, $phone, $email, $password)){
        ?>
<div id='msg-sucess'>
Sucess!
</div>
        
           
        
        <?php
    }
        else
        
        {
            ?>
            <div class='msg-erro'>You are already register!</div>
            <?php
        }
    }
    else{
        ?>
        <div class='msg-erro'>
        Password and Confirm Password are different!
        </div>
        <?php
    }
}
else{
    ?>
    <div class='msg-erro'>Error: ".$u->msgError</div>
    <?php
}
    }
else{
    ?>
    <div class='msg-erro'>Fill all the places!</div>
 <?php
}
}
?>
 
 </div>
</body>
</html>