<?php


$dbHost='localhost';
$dbName='cursophp';
$dbUser='root';
$dbPass='';

try{
	$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName","$dbUser","$dbPass");//sirveParaCrearConexion
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//paraLanzarExcepcionesNoErrores
}catch(Exception $e){
	echo $e->getMessage();
}


?>