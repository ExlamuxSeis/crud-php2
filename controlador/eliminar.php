<?php
require '../modelo/conexion.php';
require '../modelo/modelo.php';
//var_dump($_POST);

$id = $_GET['id'];
$tabla = "registro";
$conn = conexion::dbconexion();
eliminar($conn, $tabla, $id);
header('Location: ../index.php');
