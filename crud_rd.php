<?php
include_once 'db.php';

/* codigo para insertar datos */
if (isset($_POST['save'])) {
    $pais = $MySQLiconn->real_escape_string($_POST['pais']);

    $SQL = $MySQLiconn->query("INSERT INTO relacion_diplomatica(pais) VALUES('$pais')"); 

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

/* codigo para eliminar datos */    
if (isset($_GET['del'])) 
{
    $SQL = $MySQLiconn->query("DELETE FROM relacion_diplomatica WHERE id=".$_GET['del']);
    header("Location: index.php");
}

/* codigo para actualizar */
if (isset($_POST['edit'])) 
{
    $SQL = $MySQLiconn->query("SELECT * FROM relacion_diplmatica WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}

if (isset($_POST['update'])) {
    $SQL = $MySQLiconn->query("UPDATE relacion_diplomatica SET pais='".$_POST['pais']."' WHERE id=".$_GET['edit']);
}
?>