<!doctype html>
<html>
<head>
  <title>Modificaci�n de art�culo.</title>
</head>  
<body>
  
  <?php
	$mysql=new mysqli("localhost","root","","lindavista");
	if ($mysql->connect_error)
	  die("Problemas con la conexion a la base de datos");
  
    $registro=$mysql->query("select tipo_vivienda,zona_vivienda,direccion_vivieda,ndormitorios_vivienda,precio_vivienda,tamano_vivienda,extras_vivienda,foto_vivienda,observaciones_vivienda from viviendas where id_vivienda=$_REQUEST[id_vivienda]") or die($mysql->error);
	 
    if ($reg=$registro->fetch_array())
    {
  ?>
    <form method="post" action="modify2.php">
      Tipo de vivienda:
      <input type="text" name="descripcion" size="50" value="<?php echo $reg['descripcion']; ?>">
      <br>
      Precio
      <input type="text" name="precio" size="10" value="<?php echo $reg['precio']; ?>">      
      <br>      
      Rubro:
      <select name="codigorubro">
      <?php
      $registros2=$mysql->query("select codigo,descripcion from rubros") or
        die($mysql->error);
	  while ($reg2=$registros2->fetch_array())
      {
         if ($reg2['codigo']==$reg['codigorubro'])
           echo "<option value=\"".$reg2['codigo']."\" selected>".$reg2['descripcion']."</option>";         
         else
	       echo "<option value=\"".$reg2['codigo']."\">".$reg2['descripcion']."</option>";
      }		
      ?>  
      </select>      
      
      <input type="hidden" name="codigo" value="<?php echo $_REQUEST['codigo']; ?>">     
      <br> 
      <input type="submit" value="Confirmar">
    </form>
  <?php
    }      
    else
	  echo 'No existe un art�culo con dicho c�digo';
	
    $mysql->close();

  ?>  
</body>
</html>