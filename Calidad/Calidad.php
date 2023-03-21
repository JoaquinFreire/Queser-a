<?php
session_start();
?>
<?php
if (isset($_SESSION['k_username']) or isset($_SESSION['a_username'])){
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
        <link rel="stylesheet" href="calidad_leche.css?v=<?php echo time(); ?>" />
        <title>Control de calidad</title>
    </head>
<body>

<button class="botoncito" ><a href="../logout.php" >Cerrar Sesión </a></button>
<button class="volver"><a href="../Administrador/admin.php" >Volver</a></button>


<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

    <div >
    <label for="agua">Agua</label>
    <input id="agua" name="Agua" type="number" placeholder="Ingrese Porcentaje"  required>

    <label for="Materia Grasa">Materia Grasa</label>
    <input id="Materia Grasa" name="Materia-Grasa" type="number" placeholder="Ingrese Porcentaje" required>

    <label for="Proteinas">Proteinas</label>
    <input id="Proteinas" name="Proteinas" type="number" placeholder="Ingrese Porcentaje" required>

    <label for="Lactosa (Azúcar)">Lactosa (Azúcar)</label>
    <input id="Lactosa (Azúcar)" name="Lactosa" type="number" placeholder="Ingrese Porcentaje" required >

    <label for="Sales">Sales</label>
    <input id="Sales" name="Sales" type="number" placeholder="Ingrese Porcentaje" required>
    
    <label for="Cantidad">Cantidad</label>
    <input id="Cantidad" name="Cantidad" type="number" placeholder="Ingrese Cantidad de leche en litros" required>

    <label for="Temperatura">Temperatura</label>
    <input id="Temperatura" name="Temperatura" type="number" placeholder="Ingrese Temperatura °C" required>
    
    <input  type="submit" name="submit" value="Enviar datos">
    
</div>
<?php
if (isset($_POST['submit'])) {
    $Agua=$_POST['Agua'];
    $Materia_Grasa=$_POST['Materia-Grasa'];
    $Proteinas=$_POST['Proteinas'];
    $Lactosa=$_POST['Lactosa'];
    $Sales=$_POST['Sales'];
    $Cantidad=$_POST['Cantidad'];
    $Temperatura=$_POST['Temperatura'];

    $sql="INSERT INTO calidad (Agua, Materia_Grasa, Proteinas, Lactosa, Sales) VALUES ('$Agua', '$Materia_Grasa', '$Proteinas', '$Lactosa', '$Sales')";
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
    $sql="INSERT INTO recepcion_leche (Cantidad, Temperatura) VALUES ('$Cantidad', '$Temperatura')";
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

}else {
    header("Status: 301 Moved Permanently");
header("Location: ../IndexPrincipal.html");
}
?>
</body>