<?php 
 $mysql=new mysqli("localhost","root","","lindavista"); 
 if ($mysql->connect_error) 
   die("Problemas con la conexion a la base de datos"); 
 
    $mysql->query("update viviendas set  
    tipo_vivienda='$_REQUEST[tipo_vivienda]', 
    zona_vivienda='$_REQUEST[zona_vivienda]', 
    direccion_vivieda='$_REQUEST[direccion_vivieda]', 
    ndormitorios_vivienda='$_REQUEST[ndormitorios_vivienda]', 
    precio_vivienda='$_REQUEST[precio_vivienda]', 
    tamano_vivienda='$_REQUEST[tamano_vivienda]', 
    extras_vivienda='$_REQUEST[extras_vivienda]', 
    foto_vivienda='$_REQUEST[foto_vivienda]', 
    observaciones_vivienda='$_REQUEST[observaciones_vivienda]' 
    where id_vivienda='$_REQUEST[id_vivienda]'") or
      die($mysql->error()); 
 
 
 
   
    $mysql->close(); 
 
    header('Location:index.php'); 
  ?>