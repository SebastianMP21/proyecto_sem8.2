<?php 
include_once 'db.php';

if (isset($_POST['save'])) {
    $id_user= $MySQLiconn->real_escape_string($_POST['id_user']);
	$users= $MySQLiconn->real_escape_string($_POST['users']);
	$user_pass= $MySQLiconn->real_escape_string($_POST['user_pass']);
	$id_type= $MySQLiconn->real_escape_string($_POST['id_type']);
	
	$SQL = $MySQLiconn->query("INSERT INTO usuario (id_user,users,user_pass,id_type) VALUES('$id_user','$users','$user_pass','$id_type')");

	if (!$SQL) {
		echo $MySQLiconn->error;
	}
}

if (isset($_GET['del']))
{
	$SQL= $MySQLiconn->query("DELETE FROM usuario WHERE id_user=".$_GET['del']);
	header("Location:index05.php");
}


if (isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM usuario WHERE id_user=".$_GET['edit']);
	$getROW=$SQL->fetch_array();
}

if (isset($_POST['update'])) {
	$SQL = $MySQLiconn->query("UPDATE usuario SET id_user='".$_POST['id_user']."',users='".$_POST['users']."',user_pass='".$_POST['user_pass']."',id_type='".$_POST['id_type']);
	header("Location: index05.php");
}

?>