<!doctype html>
<?php
/**
 * @author Jesus Ferreras
 * @since 2024/11/21
 * @version 2024/11/26
 */

    //Se crea o reanuda la sesion
    session_start();
    
    //Si no se ha iniciado sesion
    if (!isset($_SESSION['usuarioDAW207LoginLogoffTema5'])) {
        header('Location: login.php');
        exit();
    }
    
    //Si se ha pulsado el boton 'Cerrar Sesion'
    if (isset($_REQUEST['cierreSesion'])) {
        session_destroy();
        
        header('Location: index.php');
        exit();
    }
    
    //Si se ha pulsado el boton 'Detalle'
    if (isset($_REQUEST['detalle'])) {
        header('Location: detalle.php');
        exit();
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Programa</title>
    </head>
    <body>
        <header>
            <h2>Programa</h2>
            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
                <input type="submit" id="cierreSesion" name="cierreSesion" value="Cerrar Sesión">
            </form>
        </header>
        <main>
            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
                <input type="submit" id="detalle" name="detalle" value="Detalle">
            </form>
            <?php
                print(
                    "<p>Bienvenido {$_SESSION['usuarioDAW207LoginLogoffTema5']->T01_DescUsuario} esta es la ".($_SESSION['usuarioDAW207LoginLogoffTema5']->T01_NumConexiones+1)."º vez que se conecta.".
                    ($_SESSION['usuarioDAW207LoginLogoffTema5']->T01_NumConexiones>0? " Se conectó por última vez el {$_SESSION['usuarioDAW207LoginLogoffTema5']->T01_FechaHoraUltimaConexion}</p>" : "</p>")
                );
            ?>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="https://github.com/JesusFerreras/207DWESLoginLogoffTema5.git" target="_blank"><img src="doc/github.png" alt="github"></a>
        </footer>
    </body>
</html>