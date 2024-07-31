<?php
session_start();
include "db_config.php";

if(isset($_POST['user']) || isset($_POST['senha'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $user = validate($_POST['user']);
  $sen = validate($_POST['senha']);

  if (empty($user)) { 
    header("Location: index.php?error=Digite um nome valido");
    exit();
  }
    
  if(empty($sen)) {
    header("Location: index.php?error=Digite uma senha valida");
    exit();
  }

  // $sql = "SELECT * FROM registeruser WHERE addNickName='$user' AND passwordUser='$sen'";
  $statement = $connection->prepare("SELECT * FROM registeruser WHERE addNickName = :user AND passwordUser = :sen");
  $campos = array(
    ':user' => $user,
    ':sen' => $sen
  );

  
  if ($statement->execute($campos)) {
      
    if ($statement->rowCount() > 0) {
        
     $row = $statement->fetch(PDO::FETCH_ASSOC);
      
     $_SESSION['user_name'] = $row['addNickName'];
     $_SESSION['id'] = $row['nameUserId'];
     $_SESSION['name'] = $row['nameUser'] ;
     $_SESSION['recordPersonalUser'] = $row['recordPersonalUser'];
     
      header("Location: home.php");
      
      exit();
    } else {
        
      header("Location: index.php");
      
      exit;
    }
  }
}