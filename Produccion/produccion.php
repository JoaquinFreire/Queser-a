<?php
session_start();
?>
<?php
/*if (isset($_SESSION['p_username'])){ LO DEJO COMENTADO ASÍ NO TE ENOJAS INICIANDO SESIÓN PARA VER LA PÁGINA*/
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
    <meta name="description" content="Pagina que visualiza la producción en queseria" />
    <meta name="encoding" charset="utf-8" />
    <!--Reconoce caracteres especiales-->
    <meta name="lang" content="es-ES" />

        <link rel="stylesheet" href="produccion.css?v=<?php echo time(); ?>" />
        <title>Inf.Producción</title>
    </head>
    <body>
    <button class="botoncito" ><a href="../logout.php" >Cerrar Sesión </a></button>
   <button class="volver"><a href="../Administrador/admin.php" >Volver</a></button>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

        <table id="tabla" align="center" border="1">
                <tr>
                <th>Id</th>
                <th>Tipo de queso</th>
	            <th>Peso</th>
                <th>Fermentos</th>
                <th>Analisis</th>
                <th>Cisterna</th>
                </tr>
                <?php
$sql = "SELECT * FROM `lab_fermentos` WHERE Fecha_Final != 'nada'";
$result=mysqli_query($Conexion, $sql);
while($mostrar=mysqli_fetch_array($result)){
?>

<tr>
		<td><?php echo $mostrar['idLab_fermentos']?></td>
		<td><?php echo $mostrar['Tipo_Queso']?></td>
		<td><?php echo $mostrar['Peso']?></td>
        <td><?php echo $mostrar['Fermento']?></td>
        <td><?php echo $mostrar['Analisis']?></td>
        <td><?php echo $mostrar['idCisterna']?></td>
</tr>

<?php
}
/*}else {
    header("Status: 301 Moved Permanently");
    header("Location: ../IndexPrincipal.html");
} ESTA ES LA OTRA PARTE QUE DEJO COMENTADA DEL IF*/ 
?>
</form>
</table>
</body>
</html>