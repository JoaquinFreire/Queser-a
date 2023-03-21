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
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--responsive-->
    <meta name="author" content="Freire, Nobrega, Mina, Barrionuevo" />
    <!--autores-->
    <meta name="description" content="Pagina de fabrica de queso para ver datos, subirlos, y analizarlos" />
    <meta name="encoding" charset="utf-8" />
    <!--Reconoce caracteres especiales-->
    <meta name="lang" content="es-ES" />
    <link rel="stylesheet" href="CargaQueso.css?v=<?php echo time(); ?>" /> 
	<title>Cargar Queso</title>
</head>
<body>
<button class="botoncito" ><a href="logout.php" >Cerrar Sesión </a></button>
<button class="volver"><a href="Administrador/admin.php" >Volver</a></button>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

<div>

<label for="Queso">Queso</label>
<input id="Queso" type="text" name="Queso" placeholder="Ingrese el nombre del queso" required>

<label for="TDQueso">Tipo de Queso</label>
<input id="TDQueso" type="text" name="TDQueso" placeholder="Ingrese el tipo de queso" required>

<label for="InfoNutri">Información Nutricional</label>
<input id="InfoNutri"type="text" name="InfoNutri" placeholder="Ingrese el valor nutricional" required>

<label for="Ingredientes">Ingredientes</label>
<input id="ingredientes"type="text" name="Ingredientes" placeholder="Ingrese los ingredientes" required>

<label for="Vto">Fecha de Vencimiento</label>
<input id="Vto"type="text" name="Vto" placeholder="Ingrese la fecha de vencimiento" required>

<input  type="submit" name="submit" value="Enviar datos">

</div>
<?php
if (isset($_POST['submit'])) {
$Queso=$_POST['Queso'];
$TDQueso=$_POST['TDQueso'];
$InfoNutri=$_POST['InfoNutri'];
$Ingredientes=$_POST['Ingredientes'];
$Vto=$_POST['Vto'];

$sql="INSERT INTO queso (Queso, Tipo_queso, idInformacion_Nutricional, Ingredientes, Tiempo_vencimiento) VALUES ('$Queso', '$TDQueso', '$InfoNutri', '$Ingredientes', '$Vto')";
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
header("Location: IndexPrincipal.html");
}
?>

</body>
</html>