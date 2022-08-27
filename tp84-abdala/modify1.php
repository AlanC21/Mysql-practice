<!doctype html>
<html lang="en">

<head>
  <title>Modificar</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .col-12 {
      border: 1px solid #000;
      background-color: #CECECE;
    }
  </style>
</head>

<body>
  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <?php
        $mysql = new mysqli('localhost','root','','lindavista');
        if ($mysql->connect_error)
          die("Problemas con la conexion a la base de datos");

        $registro = $mysql->query("select * from viviendas where id_vivienda='$_REQUEST[id_vivienda]'") or
          die($mysql->error);


        if ($reg = $registro->fetch_array(MYSQLI_ASSOC)) {
        ?>

          <form method="post" action="modify2.php" enctype="multipart/form-data">
          <div class="form-group">
            <br>
            Tipo de vivienda:
            <?php
            //get enum values from database and create a select list
            $result = $mysql->query("SHOW COLUMNS FROM viviendas LIKE 'tipo_vivienda'");
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $enumList = explode("','", preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $row['Type']));
            echo '<select name="tipo_vivienda">';
            foreach ($enumList as $value)
              if ($value == $reg['tipo_vivienda'])
                echo '<option value="' . $value . '" selected>' . $value . '</option>'; //define default value
              else
                echo '<option value="' . $value . '">' . $value . '</option>';
            echo '</select>';
            ?>
          </div>
          <div class="form-group">
            Zona de la vivienda:
            <?php
            //get enum values from database and create a select list
            $result = $mysql->query("SHOW COLUMNS FROM viviendas LIKE 'zona_vivienda'");
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $enumList = explode("','", preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $row['Type']));
            echo '<select name="zona_vivienda">';
            foreach ($enumList as $value)
              if ($value == $reg['zona_vivienda'])
                echo '<option value="' . $value . '" selected>' . $value . '</option>'; //define default value
              else
                echo '<option value="' . $value . '">' . $value . '</option>';
            echo '</select>';
            ?>
          </div>
          <div class="form-group">
            Direccion de la vivienda:
            <input type="text" name="direccion_vivieda" size="10" value="<?php echo $reg['direccion_vivieda']; ?>">
          </div>
          <div class="form-group">
            Dormitorios:
            <?php
            function enum_values($table, $field)
            {
              $mysql = new mysqli('localhost','root','','lindavista');
              if ($mysql->connect_error)
                die("Problemas con la conexion a la base de datos");
              $type = $mysql->query("SHOW COLUMNS FROM viviendas LIKE 'ndormitorios_vivienda'")->fetch_object()->Type;
              preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
              $enum = explode("','", $matches[1]);
              return $enum;
            }
            $enum = enum_values('viviendas', 'ndormitorios_vivienda');
            echo '<select name="ndormitorios_vivienda">';
            foreach ($enum as $value)
              if ($value == $reg['ndormitorios_vivienda'])
                echo '<option value="' . $value . '"selected>' . $value . '</option>'; //define default value
              else
                echo '<option value="' . $value . '">' . $value . '</option>';
            echo '</select>';
            ?>
          </div>
          <div class="form-group">
            Precio:
            <input type="text" name="precio_vivienda" size="100" value="<?php echo $reg['precio_vivienda']; ?>">
          </div>
          <div class="form-group">
            Tamaño de la vivienda:
            <input type="text" name="tamano_vivienda" size="100" value="<?php echo $reg['tamano_vivienda']; ?>">
          </div>
          <div class="form-group">
            Extras:
            <?php

            $result = $mysql->query("SHOW COLUMNS FROM viviendas LIKE 'extras_vivienda'");
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $enumList = explode("','", preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $row['Type']));
            echo '<select name="extras_vivienda">';
            foreach ($enumList as $value)
              if ($value == $reg['extras_vivienda'])
                echo '<option value="' . $value . '" selected>' . $value . '</option>'; //define default value
              else
                echo '<option value="' . $value . '">' . $value . '</option>';
            echo '</select>';
            ?>
          </div>
          <div class="form-group">
            Foto de la vivienda:
            <input type="file" name="foto_vivienda">
          </div>
          <div class="form-group">
            Observaciones:
            <input type="text" name="observaciones_vivienda" size="100" value="<?php echo $reg['observaciones_vivienda']; ?>">
          </div>
          <div class="form-group">
            <input type="hidden" name="id_vivienda" value="<?php echo $_REQUEST['id_vivienda']; ?>">
          </div>
          <div class="form-group">
            <input type="submit" value="Confirmar">
          </div>
          </form>
      </div>
    </div>
  </div>
<?php
  } else
    echo 'No existe un articulo con dicho codigo.';
?>

</body>

</html>
