<?php
include "db_config.php";

// print_r($dataResult);

?>

<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" type="text/css" href="fb.css">
</head>

<body>
    <main>
        <table class="TabeladeRank" t>
            <thead>
                <tr>
                    <th>Rank Global</th>
                    <th>Nick Name</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($dataResult as $value) { ?>
                    <tr>
                        <td><?php echo $value['recordPersonalUser']; ?></td>
                        <td><?php echo $value['addNickName']; ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <form action="login.php" method="post">
            <h2>ENTRAR</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="fb error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Usuario</label>
            <input type="text" name="user" placeholder="Usuario">

            <label>Senha</label>
            <input type="password" name="senha" placeholder="Senha">

            <button type="submite">Entrar</button>
            <a href="singup.php" class="ca">Crie uma conta</a>
        </form>

    </main>
</body>

</html>