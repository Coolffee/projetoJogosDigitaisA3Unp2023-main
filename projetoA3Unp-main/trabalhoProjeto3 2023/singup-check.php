<?php
session_start();
include "db_config.php";

if(isset($_POST['user']) && isset($_POST['senha']) && isset($_POST['nome'])/* && isset($_POST['conf_senha'])*/) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;       
    }

     $user = validate($_POST['user']);
     $sen = validate($_POST['senha']);
     
     $nome = validate($_POST['nome']);
     //$conf_sen = validate($_POST['conf_senha']);

     $user_data = 'user'. $user. '&nome='. $nome;

     
    if (empty($user)) { 
        header("Location: singup.php?error=Usuario é obrigatorio&$user_data");
        exit();
    }else if(empty($sen)) {
        header("Location: singup.php?error=Senha é obrigatorio&$user_data");
        exit();
    }
    /*else if(empty($conf_sen)) {
        header("Location: singup.php?error=Confirmar senha é obrigatorio&$user_data");
        exit();
    }*/

    else if(empty($nome)) {
        header("Location: singup.php?error=Nome é obrigatorio&$user_data");
        exit();
    }

    /*else if($sen !== $conf_sen) {
       header("Location: singup.php?error=Senha deve ser igual a confirmar senha&$user_data");
       exit();
    }*/
    
    else{

        //$sen = md5($sen);

        $sql = "SELECT * FROM registeruser WHERE addNickName = '$user'";
    
        $statement = $connection->query($sql);
                
        if ($statement->rowCount() > 0) {

            header("Location: singup.php?error=Usuario ja cadastrado tente outro&$user_data");
            exit();

        }
        else {

            $sql2 = "INSERT INTO registeruser (addNickName, passwordUser, nameUser, recordPersonalUser)
            VALUES('$user', '$sen', '$nome', 0)";
            
            try{

                $statement2 = $connection->query($sql2);
                header("Location: singup.php?success=Sua conta foi criada com sucesso");
                exit();

            }
            catch(PDOException $e){
                header("Location: singup.php?error=Erro desconhecido&$user_data");
                exit();
            }

            
        }
 }
}
else{
   header("Location: singup.php");
   exit;

}

 
