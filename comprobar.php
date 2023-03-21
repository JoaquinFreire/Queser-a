<?php
session_start();
?>

<?php
if (isset ($_SESSION['k_username'])){

            header("Status: 301 Moved Permanently");
            header("Location: Calidad/Calidad.php");

    }else{
        '<SCRIPT LANGUAGE="javascript">
                header("location: IndexPrincipal.html");
                </SCRIPT>';
    }
    if (isset ($_SESSION['f_username'])){

        header("Status: 301 Moved Permanently");
        header("Location: Fermentos/Fermentos.php");

}else{
    '<SCRIPT LANGUAGE="javascript">
            header("location: IndexPrincipal.html");
            </SCRIPT>';
}

?>