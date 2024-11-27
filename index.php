<!doctype html>
<?php
/**
 * @author Jesus Ferreras
 * @since 2024/11/21
 * @version 2024/11/26
 */

    if (isset($_REQUEST['login'])) {
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
        <title>Index</title>
    </head>
    <body>
        <header>
            <div>
                <h2>Index</h2>
            </div>
            <div>
                <?php
                    //Si ya se ha iniciado sesion
                    if (isset($_SESSION['usuarioDAW207LoginLogoffTema5'])) {
                        print(<<<FIN
                            <p>{$_SESSION['usuarioDAW207LoginLogoffTema5']->T01_DescUsuario}</p>
                            <img src="{$_SESSION['usuarioDAW207LoginLogoffTema5']->T01_ImagenUsuario}" alt="img">
                        FIN);
                    }
                ?>
                <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
                    <input type="submit" id="login" name="login" value="login">
                </form>
            </div>
        </header>
        <main>
            
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="https://github.com/JesusFerreras/207DWESLoginLogoffTema5.git" target="_blank"><img src="doc/github.png" alt="github"></a>
        </footer>
    </body>
</html>