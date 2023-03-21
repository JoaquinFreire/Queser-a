<?php

$User="root";
$Pass="";
$Servidor="localhost";
$Base="quesos_termolac";

$Conexion=mysqli_connect($Servidor, $User, $Pass);
$BD=mysqli_select_db($Conexion, $Base);
?>

<!DOCTYPE html>
<html lang="ES">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--responsive-->
    <meta name="author" content="Freire, Nobrega, Mina, Barrionuevo" />
    <!--autores-->
    <meta name="description" content="Pagina de fabrica de queso para ver datos, subirlos, y analizarlos" />
    <meta name="encoding" charset="utf-8" />
    <!--Reconoce caracteres especiales-->
    <meta name="lang" content="es-ES" />
        <link rel="stylesheet" href="Cisterna.css?v=<?php echo time(); ?>" />
        <title>Cisternas</title>
    </head>
<body>
    <div>
    <label for="Cisterna">Nombre de la Cisterna</label>
    <input id="Cisterna" name="Cisterna" type="text" placeholder="Ingrese la cisterna">
    <label for="Capacidad">Capacidad de la Cisterna</label>
    <input id="Capacidad" name="Capacidad" type="text" placeholder="Ingrese la capacidad">
    <label for="Descripcion">Descripcion de la Cisterna</label>
    <input id="Descripcion" name="Descripcion" type="text" placeholder="Descripcion de la cisterna">

    <input type="submit" value="Enviar">

</div>
<?php
if (isset($_POST['submit'])) {
    $Cisterna=$_POST['Cisterna'];
    $Capacidad=$_POST['Capacidad'];
    $Descripcion=$_POST['Descripcion'];

    $sql="INSERT INTO cisterna (Nombre, Capacidad, Descripcion) VALUES ('$Cisterna', '$Capacidad', '$Descripcion')";
    $result=mysqli_query($Conexion, $sql);

    if ($result==FALSE) {
        ?>
        <p align="center"><?php echo("Error al guardar");?></p>
    <?php
    }
    else{
        ?>
        <p align="center"><?php echo("Guardado con exito");?></p>
    <?php
    }
}
?>
</body>