<?php
session_start();
?>

<?php //abro etiqueta

//declaro varibales para la conexion con base de datos
$User= "root"; 
$Pass= "";
$Servidor="localhost";
$Base="quesos_termolac";
//conecto con la base de datos
$conectar=mysqli_connect($Servidor, $User, $Pass) or die ("IMPOSIBLE CONECTAR CON BASE DE DATOS");
//obtengo las variables de html
$usuario= $_POST['usuario'];
$Password= $_POST['password'];


//selecciono a que base de datos me quiero conectar
$bd=mysqli_select_db($conectar, $Base) or die ("ERROR 404");

//realizo la consulta en mysql
$sql = "SELECT * FROM usuario WHERE User = '".$usuario."' AND Pass = '".$Password."'";

//corroboro que la consulta se haya realizado correctamente
$Query=mysqli_num_rows(mysqli_query($conectar,$sql)); 

	if($Query>0)
		{
		switch ($usuario) {
			case 'Admin':
				header("Status: 301 Moved Permanently");
				
				$_SESSION["a_username"] = $usuario;
				header("Location: Administrador/admin.php");
				break;
			
			case 'Laboratorio':
				header("Status: 301 Moved Permanently");
				$_SESSION["f_username"] = $usuario;
				header("Location: Fermentos/Fermentos.php");
				
					break;
			case 'Control Calidad':
				header("Status: 301 Moved Permanently");
				$_SESSION["k_username"] = $usuario;
				header("Location: Calidad/calidad.php");
				
					break;
			case 'Produccion':
				header("Status: 301 Moved Permanently");
				$_SESSION["p_username"] = $usuario;
				header("Location: Produccion/produccion.php");
				
			default:
				break;
		}
		
		exit;
		}
		else
		{
			header("Status: 301 Moved Permanently");
			header("Location: IndexPrincipal.html");
		}