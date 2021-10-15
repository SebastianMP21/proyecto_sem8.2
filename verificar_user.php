<?php
$usuario=$_POST['users'];
$password=$_POST['user_pass'];
session_start();
error_reporting(0);
$_SESSION['users']=$usuario;

$conexion=mysqli_connect("localhost","root","","relacion_paises");
$consulta="SELECT*FROM usuario where users='$usuario' and user_pass='$password'";
$resultado=mysqli_query($conexion,$consulta);


$filas=mysqli_fetch_array($resultado);

if ($filas['id_type']==1) { //superadmin
    header("Location:index05.php");
}else 
if($filas['id_type']==2){ //usuario_g
    header("Location:index01.php");
}
else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTICACIÓN</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>

