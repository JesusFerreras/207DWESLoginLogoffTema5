<!doctype html>
<?php
/**
 * @author Jesus Ferreras
 * @since 2024/11/21
 * @version 2024/11/21
 */

    if (isset($_REQUEST['login'])) {
        header('Location: login.php');
        exit();
    }
    if (isset($_REQUEST['programa'])) {
        header('Location: programa.php');
        exit();
    }
?>

<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
            <input type="submit" id="login" name="login" value="login">
            <input type="submit" id="programa" name="programa" value="programa">
        </form>
    </body>
</html>