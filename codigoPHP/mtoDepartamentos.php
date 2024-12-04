<!doctype html>
<?php
/**
 * @author Jesus Ferreras
 * @since 2024/12/02
 * @version 2024/12/02
 */
    
    //Se crea o reanuda la sesion
    session_start();
    
    //Si no se ha iniciado sesion
    if (!isset($_SESSION['usuarioDAW207LoginLogoffTema5'])) {
        header('Location: login.php');
        exit();
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Mto. Departamentos</title>
    </head>
    <body>
        <header>
            <h2>Mto. Departamentos</h2>
        </header>
        <main>
        </main>
        <footer>
            <a href="../../../index.html">Jesús Ferreras González</a>
            <a href="../../207DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="https://github.com/JesusFerreras/207DWESLoginLogoffTema5.git" target="_blank"><img src="../doc/github.png" alt="github"></a>
            <a href="https://www.w3schools.com/" target="_blank">Página imitada</a>
        </footer>
    </body>
</html>