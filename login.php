<!doctype html>
<?php
/**
 * @author Jesus Ferreras
 * @since 2024/11/21
 * @version 2024/11/26
 */

    session_start();
    
    if (!isset($_SESSION['usuarioDAW207LoginLogoffTema5'])) {
        header('Location: login.php');
        exit();
    }
            
    //Se importa el fichero con los parametros de conexion
    require_once 'config/confDB.php';

    $mensajeError = '';

    if (isset($_REQUEST['volver'])) {
        header('Location: index.php');
        exit();
    }
    if (isset($_REQUEST['inicioSesion'])) {
        if (isset($_REQUEST['codigoUsuario']) && isset($_REQUEST['contrasenaUsuario'])) {
            try {
                //Se abre la conexion
                $DB = new PDO(DSN, USUARIO, PASSWORD);

                //Se recoge el usuario con el codigo introducido
                $seleccion = $DB->prepare(<<<FIN
                    select * from T01_Usuario
                        where T01_CodUsuario = :codigo
                        and T01_Password = sha2(:contrasena, 256)
                    ;
                FIN);

                $seleccion->execute([
                    ':codigo' => $_REQUEST['codigoUsuario'],
                    ':contrasena' => $_REQUEST['codigoUsuario'].$_REQUEST['contrasenaUsuario']
                ]);
                
                $usuario = $seleccion->fetchObject();

                //Si no existe el usuario
                if (!$usuario) {
                    $mensajeError = '<p>Error de autenticación</p>';
                } else {
                    //Se actualiza el numero de conexiones del usuario
                    $DB->exec(<<<FIN
                        update T01_Usuario
                            set T01_NumConexiones = T01_NumConexiones+1,
                            T01_FechaHoraUltimaConexion = now()
                            where T01_CodUsuario = '{$_REQUEST['codigoUsuario']}'
                        ;
                    FIN);
                    
                    $_SESSION['usuarioDAW207LoginLogoffTema5'] = $usuario;
                            
                    header('Location: programa.php');
                    exit();
                }
            } catch (Exception $ex) {
                //Se muestran el mensaje y codigo de error
                $mensajeError = '<p>Error: '.$ex->getMessage().'<br>Codigo: '.$ex->getCode().'</p>';
            } finally {
                //Se cierra la conexion
                unset($DB);
            }
        } else {
            $mensajeError = '<p>Error de autenticación</p>';
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Login</title>
    </head>
    <body>
        <header>
            <h2>Login</h2>
        </header>
        <main>
            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
                <input type="text" id="codigoUsuario" name="codigoUsuario">
                <input type="password" id="contrasenaUsuario" name="contrasenaUsuario">
                <input type="submit" id="inicioSesion" name="inicioSesion" value="Iniciar sesión">
                <input type="submit" id="volver" name="volver" value="Volver">
                <?php print($mensajeError); ?>
            </form>
        </main>
        <footer>
            <a href="../../index.html">Jesús Ferreras González</a>
            <a href="https://github.com/JesusFerreras/207DWESLoginLogoffTema5.git" target="_blank"><img src="doc/github.png" alt="github"></a>
        </footer>
    </body>
</html>