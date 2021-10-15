<?php
include_once 'db.php';

/* codigo para insertar datos */
if (isset($_POST['save'])) {
    $pais_com = $MySQLiconn->real_escape_string($_POST['pais_com']);

    $SQL = $MySQLiconn->query("INSERT INTO relacion_comercial(pais_com) VALUES('$pais_com')"); 

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

/* codigo para eliminar datos */    
if (isset($_GET['del'])) 
{
    $SQL = $MySQLiconn->query("DELETE FROM relacion_comercial WHERE id=".$_GET['del']);
    header("Location: index.php");
}

/* codigo para actualizar */
if (isset($_POST['edit'])) 
{
    $SQL = $MySQLiconn->query("SELECT * FROM relacion_comercial WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}

if (isset($_POST['update'])) {
    $SQL = $MySQLiconn->query("UPDATE relacion_comercial SET pais_com='".$_POST['pais_com']."' WHERE id=".$_GET['edit']);
}
?>