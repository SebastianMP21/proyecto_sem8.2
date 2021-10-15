<?php
include_once 'db.php';

/* codigo para insertar datos */
if (isset($_POST['save'])) {
    $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
    $id_pais = $MySQLiconn->real_escape_string($_POST['id_pais']);

    $SQL = $MySQLiconn->query("INSERT INTO pais(nombre,id_pais) VALUES('$nombre','$id_pais')"); 

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}


/* codigo para eliminar datos */    
if (isset($_GET['del'])) 
{
    $SQL = $MySQLiconn->query("DELETE FROM pais WHERE id_pais=".$_GET['del']);
    header("Location: index_pa.php");
}

/* codigo para actualizar */
if(isset($_GET['edit'])){
    $SQL = $MySQLiconn->query("SELECT * FROM pais WHERE id_pais=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
    
  }

if (isset($_POST['update'])) {
    $SQL = $MySQLiconn->query("UPDATE pais SET nombre='".$_POST['nombre']."', id_pais='".$_POST['id_pais']."' WHERE id_pais=".$_GET['edit']);
    header("Location: index_pa.php");
}
?>