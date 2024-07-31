<?php
include "db_config.php";
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>

    <body>
    <h1>Hello, <?php echo $_SESSION['name'] ?></h1>    
    <h1>Score, <?php echo $_SESSION['recordPersonalUser'] ?></h1>


        <a href="logout.php">Logout</a>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    //print_r($_SESSION);
    exit();
}
?>