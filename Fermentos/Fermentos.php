<?php
session_start();
?>
<?php
if (isset($_SESSION['f_username'])or isset($_SESSION['a_username'])){
    
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
    <meta name="author" content="Freire, Nobrega, Mina, Barrionuevo," />
    <!--autores-->
    <meta name="description" content="Pagina de fabrica de queso para ver datos, subirlos, y analizarlos" />
    <meta name="encoding" charset="utf-8" />
    <!--Reconoce caracteres especiales-->
    <meta name="lang" content="es-ES" />
        <link rel="stylesheet" href="Lab_Fermento.css?v=<?php echo time(); ?>" />
        <title>Fermentos</title>
    </head>

   <body>
   <button class="botoncito" ><a href="../logout.php" >Cerrar Sesión </a></button>
   <button class="volver"><a href="../Administrador/admin.php" >Volver</a></button>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
    
    <div>

    <div class="col-25">
    <label for="Fermento">Fermento</label>
    </div>
    <textarea type="text" name="Fermento" id="Fermento" name="Fermento" placeholder="Describa los fermentos" style="height:200px" required></textarea>

        
        <label for="Analisis">Analisis</label>
        <textarea name="Analisis" type="text" placeholder="Ingrese El analisis" style="height:200px" required></textarea>
    
        <label for="Peso">Peso</label>
        <input id="Peso" name="Peso" type="number" placeholder="Ingrese el peso" required>

        <label for="idQueso">Tipo De Queso</label>
        <SELECT name="idQueso" type="text" placeholder="Ingrese El Tipo de Queso" required>
            <option value="1">Queso Random</option> 
            <option value="2">Quesito</option> 
            <option value="3">Queso XP</option>
            <option value="10">qusuli</option> 
            <option value="11">Debian</option> 
            <option value="12">Suse</option> 
        </SELECT> 
    

        <input name="submit" type="submit" value="Enviar">
    </div>

<?php
if (isset($_POST['submit'])) {
    $Fermento=$_POST['Fermento'];
    $Analisis=$_POST['Analisis'];
    $Peso=$_POST['Peso'];

    $sql="INSERT INTO lab_fermentos (Fermento, Analisis, Peso) VALUES ('$Fermento', '$Analisis', '$Peso')";
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
}}else {
    header("Status: 301 Moved Permanently");
header("Location: ../IndexPrincipal.html");
}
?>
</body>
