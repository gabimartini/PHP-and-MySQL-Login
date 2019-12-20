<?php

//mysql: dbname=".$name." host=".$host

Class User
{
    private $pdo;
    public $msgError = "";

    public function mysqli($name, $host, $usuario, $senha){

        global $pdo;
        try{
            $pdo = new PDO("mysql:host=$host;dbname=$name", $usuario, $senha );
        } catch(PDOException $e){
$msgError = $e ->getMessage();
        }
        
      
    }


    public function cadastrar($name, $phone, $email, $password){
        global $pdo;
        //verification
        $sql = $pdo->prepare("SELECT id FROM users WHERE email = :e"); //e is email
        $sql->bindValue(":e", $email); //change e for email
        $sql->execute();
        if($sql->rowCount() > 0) // se tiver id, a linha vai ser maior que 0, então já foi cadastrado
    {
        return false;
    } else{
        $sql= $pdo->prepare("INSERT INTO users (nome, phone, email, senha) VALUES (:n, :t, :e, :s)");
        $sql->bindValue(":n", $name);
        $sql->bindValue(":t", $phone);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($password));
        $sql->execute();
        
        return true;

    }
  }

    public function logar($email, $password){
        global $pdo;
        //verificar se o email foi cadastrado
        $sql = $pdo ->prepare("SELECT id, nome FROM users WHERE email =:e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($password));
        $sql->execute();
        if($sql->rowCount()>0)
        {
            $data = $sql ->fetch();//fetch pega o que queremos e transforma em array
            session_start();
            $_SESSION['id'] = $data['id'];
            $_SESSION['nome'] = $data['nome'];
            return true;
        } else{
            return false;
        }
    }  

}


?>