<?php
session_start();
?>
<?php
if (isset($_SESSION['a_username'])){
    ?>
<html>
    
    <head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
	<!--Para no leer el cache y evitar problemas-->
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin.css?v=<?php echo time();?>"/>
    <title>Administrador</title>
</head>
    <body>
    
  
        <h1>ADMINISTRADOR</h1>
        <h3>Elegir el sector a utilizar</h3>

    <div class="menu">
        <a href="../Calidad/calidad.php">Control de calidad</a>
        <a href="../Fermentos/Fermentos.php">Laboratorio de fermentos</a>
        <a href="../Produccion/produccion.php">Información de producción</a></li>
        <a href="../CargaQueso.php">Cargar quesos</a></li>
        <img style="float:right"><a class="active" href="../logout.php">Cerrar Sesión</a>

    </div>
<?php
}else {
    header("Status: 301 Moved Permanently");
header("Location: ../IndexPrincipal.html");
}
?>
</body>
</html>