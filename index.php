<!doctype html>
<?php
/**
 * @author Jesus Ferreras
 * @since 2024/11/21
 * @version 2024/12/03
 */

    //Se crea o reanuda la sesion
    session_start();

    //Si se ha escogido un idioma
    if (isset($_REQUEST['idioma'])) {
        setcookie('idioma', $_REQUEST['idioma']);
    }

    //Si se ha pulsado el boton 'Login'
    if (isset($_REQUEST['login'])) {
        header('Location: codigoPHP/login.php');
        exit();
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="webroot/css/estilos.css">
        <title>Index</title>
        <style>
            /*Resalta el idioma indicado por la cookie, espanol por defecto*/
            label[for="<?php echo(isset($_COOKIE['idioma'])? $_COOKIE['idioma'] : 'es'); ?>"] {
                background-color: var(--fondo1);
            }
        </style>
    </head>
    <body>
        <header>
            <div>
                <h2>Index</h2>
            </div>
            <div>
                <form id="seleccionIdioma" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
                    <input type="submit" name="idioma" id="es" value="es">
                    <label for="es">&#127466&#127480</label>
                    <input type="submit" name="idioma" id="en" value="en">
                    <label for="en">&#127468&#127463</label>
                </form>
                <form id="accesoCuenta" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
                    <input type="submit" id="login" name="login" value="Login">
                </form>
            </div>
        </header>
        <main>
            <img src="doc/arbolNavegacion.png" alt="alt"/>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="../207DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="https://github.com/JesusFerreras/207DWESLoginLogoffTema5.git" target="_blank"><img src="doc/github.png" alt="github"></a>
            <a href="https://www.w3schools.com/" target="_blank">Página imitada</a>
        </footer>
    </body>
</html>