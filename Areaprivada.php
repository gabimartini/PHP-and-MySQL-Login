<?php
session_start();
if(!isset($_SESSION['id']))
{
    header("location: index.php");
    exit;
}

$nome= $_SESSION["nome"];
$n= ucwords($nome);
    ?>





    
    <link rel="stylesheet" href="area.css">
  


<div id='welcome'>WELCOME!!</div><div id='logado'><p><?php echo  $n; ?></p></div>


<a id='button-privado' href="sair.php"><p>Logout</p></a>


