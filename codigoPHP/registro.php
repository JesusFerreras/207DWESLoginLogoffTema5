<!doctype html>
<?php
/**
 * @author Jesus Ferreras
 * @since 2024/12/02
 * @version 2024/12/02
 */
    
    //Se crea o reanuda la sesion
    session_start();
    
    //Se importa el fichero con los parametros de conexion
    require_once '../config/confDB.php';

    $mensajeError = '';
    
    //Indica si se debe abandonar la pagina
    $salir = false;
    
    if (isset($_REQUEST['volver'])) {
        header('Location: ../index.php');
        exit();
    }
    
    if (isset($_REQUEST['inicioSesion'])) {
        header('Location: login.php');
        exit();
    }
    
    //Si se ha pulsado el boton 'Iniciar Sesion'
    if (isset($_REQUEST['registro'])) {
        //Si se han rellenado los campos 'codigoUsuario' y 'contrasenaUsuario'
        if (isset($_REQUEST['codigoUsuario']) && isset($_REQUEST['contrasenaUsuario']) && isset($_REQUEST['descUsuario'])) {
            try {
                //Se abre la conexion
                $DB = new PDO(DSN, USUARIO, PASSWORD);

                //Se recoge el usuario con el codigo introducido
                $seleccion = $DB->prepare(<<<FIN
                    select * from T01_Usuario
                        where T01_CodUsuario = :codigo
                    ;
                FIN);

                $seleccion->execute([
                    ':codigo' => $_REQUEST['codigoUsuario']
                ]);

                //Si ya existe el usuario
                if ($seleccion->rowCount() != 0) {
                    $mensajeError = '<p class="error">Ya existe el usuario</p>';
                } else {
                    //Se actualiza el numero de conexiones del usuario
                    $insercion = $DB->prepare(<<<FIN
                        insert into T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario,T01_Perfil) values
                            (:codigo, sha2(:contrasena, 256), :descripcion, :perfil)
                        ;
                    FIN);

                    $actualizacion->execute([
                        ':codigo' => $_REQUEST['codigoUsuario'],
                        ':contrasena' => $_REQUEST['codigoUsuario'].$_REQUEST['contrasenaUsuario'],
                        ':descripcion' => $_REQUEST['descUsuario'],
                        ':perfil' => $_REQUEST['perfilUsuario']
                    ]);
                    
                    
                    $seleccion->execute([
                        ':codigo' => $_REQUEST['codigoUsuario']
                    ]);
                    
                    $_SESSION['usuarioDAW207LoginLogoffTema5'] = $seleccion->fetchObject();
                    
                    header('Location: programa.php');
                    $salir = true;
                }
            } catch (Exception $ex) {
                //Se muestran el mensaje y codigo de error
                $mensajeError = '<p class="error">Error: '.$ex->getMessage().'<br>Codigo: '.$ex->getCode().'</p>';
            } finally {
                //Se cierra la conexion
                unset($DB);
                
                if ($salir) {
                    exit();
                }
            }
        } else {
            $mensajeError = '<p class="error">Se deben rellenar todos los datos</p>';
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="../webroot/css/estilos.css">
        <title>Registro</title>
    </head>
    <body>
        <header>
            <h2>Registro</h2>
        </header>
        <main>
            <form id="inicioSesion" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
                <div>
                    <input type="submit" id="volver" name="volver" value="X">
                </div>
                <input type="text" id="codigoUsuario" name="codigoUsuario" placeholder="Código" required autofocus><br>
                <input type="password" id="contrasenaUsuario" name="contrasenaUsuario" placeholder="Contraseña" required><br>
                <input type="text" id="descUsuario" name="descUsuario" placeholder="Descripción" required><br>
                <div>
                    <input type="radio" id="usuarioUsuario" name="perfilUsuario" value="usuario" <?php echo(isset($_REQUEST['perfilUsuario']) && $_REQUEST['perfilUsuario']=='usuario' ? 'checked':'');?> required>
                    <label for="usuarioUsuario">Usuario</label>
                    <input type="radio" id="adminUsuario" name="perfilUsuario" value="administrador" <?php echo(isset($_REQUEST['perfilUsuario']) && $_REQUEST['perfilUsuario']=='administrador' ? 'checked':'');?> required>
                    <label for="usuarioUsuario">Administrador</label>
                </div>
                <?php print($mensajeError); ?>
                <div>
                    <input type="submit" id="inicioSesion" name="inicioSesion" value="Iniciar sesión">
                    <input type="submit" id="registro" name="registro" value="Registrarse">
                </div>
            </form>
        </main>
        <footer>
            <a href="../../../index.html">Jesús Ferreras González</a>
            <a href="../../207DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="https://github.com/JesusFerreras/207DWESLoginLogoffTema5.git" target="_blank"><img src="../doc/github.png" alt="github"></a>
            <a href="https://www.w3schools.com/" target="_blank">Página imitada</a>
        </footer>
    </body>
</html>