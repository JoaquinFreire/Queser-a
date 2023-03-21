<?php
session_start();

session_destroy();?>
<?php
header("Status: 301 Moved Permanently");
header("Location: IndexPrincipal.html");
?>