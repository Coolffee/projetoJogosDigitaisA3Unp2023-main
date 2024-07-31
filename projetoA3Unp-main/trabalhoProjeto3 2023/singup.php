<!DOCTYPE html>
<html>
<head>
    <title>REGISTRO</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" type="text/css" href="fb.css">
</head>
<body>
    <form action="singup-check.php" method="post">
        <h2>EFETUE SEU CADASTRO</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="fb error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="fb success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <label>Nome</label>
        <?php if (isset($_GET['nome'])) { ?>
           <input type="text" 
               name="nome" 
               placeholder="Nome" 
               value="<?php echo $_GET['nome']; ?>">
        <?php }else{ ?>
          <input type="text" 
          name="nome" 
          placeholder="Nome" 
           >
        <?php } ?>
        <label>Usuario</label>
        <?php if (isset($_GET['user'])) { ?>
           <input type="text" 
               name="user" 
               placeholder="Usuario" 
               value="<?php echo $_GET['user']; ?>">
        <?php }else{ ?>
          <input type="text" 
          name="user" 
          placeholder="Usuario" 
           >
        <?php } ?>

        
        <label>Senha</label>
        <input type="password" name="senha" placeholder="Senha">

        <!--<label>Confirmar Senha</label>
        <input type="password" name="conf_senha" placeholder="Confirmar Senha">-->

        <button type="submite">Cadastrar</button>
        <a href="index.php" class="ca">Já possui uma conta?</a>
    </form>
</body>
</html>