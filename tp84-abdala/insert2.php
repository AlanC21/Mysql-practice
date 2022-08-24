<?php 
 $mysql=new mysqli("localhost","root","","lindavista"); 
 if ($mysql->connect_error) 
   die("Problemas con la conexion a la base de datos"); 
   
    $mysql->query("insert into viviendas (tipo_vivienda, zona_vivienda, direccion_vivieda, ndormitorios_vivienda, precio_vivienda, tamano_vivienda, extras_vivienda, foto_vivienda, observaciones_vivienda) 
    values ('$_REQUEST[tipo_vivienda]', '$_REQUEST[zona_vivienda]', '$_REQUEST[direccion_vivieda]', '$_REQUEST[ndormitorios_vivienda]', '$_REQUEST[precio_vivienda]', '$_REQUEST[tamano_vivienda]', '$_REQUEST[extras_vivienda]', '$_REQUEST[foto_vivienda]', '$_REQUEST[observaciones_vivienda]')") or die($mysql->error); 
 
    $mysql->close(); 
 
    header('Location:mantenimientoarticulos.php');     
?>