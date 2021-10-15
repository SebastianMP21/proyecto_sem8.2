<?php
include_once 'db.php';

/* codigo para insertar datos */
if (isset($_POST['save'])) {
    $id_prod = $MySQLiconn->real_escape_string($_POST['id_prod']);
    $nombre_prod = $MySQLiconn->real_escape_string($_POST['nombre_prod']);
    $descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
    $SQL = $MySQLiconn->query("INSERT INTO productos(id_prod,nombre_prod,descripcion) VALUES('$id_prod','$nombre_prod','$descripcion')"); 

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

/* codigo para eliminar datos */    
if (isset($_GET['del'])) 
{
    $SQL = $MySQLiconn->query("DELETE FROM productos WHERE id_prod=".$_GET['del']);
    header("Location: index_pro.php");
}

/* codigo para actualizar */
if(isset($_GET['edit'])){
    $SQL = $MySQLiconn->query("SELECT * FROM productos WHERE id_prod=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
    
    
  }

if (isset($_POST['update'])) {
    $SQL = $MySQLiconn->query("UPDATE productos SET id_prod='".$_POST['id_prod']."',nombre_prod='".$_POST['nombre_prod']."',descripcion='".$_POST['descripcion']."' WHERE id_prod=".$_GET['edit']);
    header("Location: index_pro.php");
}

?>