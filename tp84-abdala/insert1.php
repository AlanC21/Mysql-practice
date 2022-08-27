<!doctype html>
<html lang="en">

<head>
  <title>Insertar</title>
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
        <form method="post" action="insert2.php" enctype="multipart/form-data">
          <div class="form-group">
            <br>
            Tipo vivienda:
            <?php
            //get enum value from database 
            $mysql = new mysqli('localhost','458236','Zekon1452','458236');
            if ($mysql->connect_error)
              die("Problemas con la conexion a la base de datos");
            $registros = $mysql->query("select COLUMN_TYPE from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='viviendas' and COLUMN_NAME='tipo_vivienda'") or
              die($mysql->error);
            $reg = $registros->fetch_array();
            $enumList = explode(",", str_replace("'", "", substr($reg['COLUMN_TYPE'], 5, (strlen($reg['COLUMN_TYPE']) - 6))));
            echo '<select name="tipo_vivienda">';
            foreach ($enumList as $value)
              echo '<option value="' . $value . '">' . $value . '</option>';
            echo '</select>';
            ?>
          </div>
          <div class="form-group">
            Zona vivienda:
            <?php
            //get enum value from database 
            $mysql = new mysqli('localhost','458236','Zekon1452','458236');
            if ($mysql->connect_error)
              die("Problemas con la conexion a la base de datos");
            $registros = $mysql->query("select COLUMN_TYPE from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='viviendas' and COLUMN_NAME='zona_vivienda'") or
              die($mysql->error);
            $reg = $registros->fetch_array();
            $enumList = explode(",", str_replace("'", "", substr($reg['COLUMN_TYPE'], 5, (strlen($reg['COLUMN_TYPE']) - 6))));
            echo '<select name="zona_vivienda">';
            foreach ($enumList as $value)
              echo '<option value="' . $value . '">' . $value . '</option>';
            echo '</select>';
            ?>
          </div>
          <div class="form-group">
            Direccion vivienda:
            <input type="text" name="direccion_vivieda" required>
          </div>
          <div class="form-group">
            Numero de dormitorios:
            <?php
            //get enum value from database with number 3 like default value 
            $mysql = new mysqli('localhost','458236','Zekon1452','458236');
            if ($mysql->connect_error)
              die("Problemas con la conexion a la base de datos");
            $registros = $mysql->query("select COLUMN_TYPE from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='viviendas' and COLUMN_NAME='ndormitorios_vivienda'") or
              die($mysql->error);
            $reg = $registros->fetch_array();
            $enumList = explode(",", str_replace("'", "", substr($reg['COLUMN_TYPE'], 5, (strlen($reg['COLUMN_TYPE']) - 6))));
            echo '<select name="ndormitorios_vivienda">';
            foreach ($enumList as $value)
              if ($value == 3)
                echo '<option value="' . $value . '" selected>' . $value . '</option>'; //define default value 
              else
                echo '<option value="' . $value . '">' . $value . '</option>';
            echo '</select>';
            ?>
          </div>
          <div class="form-group">
            Precio vivienda:
            <input type="text" name="precio_vivienda" required>
          </div>
          <div class="form-group">
            Tamaño vivienda:
            <input type="text" name="tamano_vivienda" required>
          </div>
          <div class="form-group">
            Extras vivienda:
            <?php
            //get enum value from database 
            $mysql = new mysqli('localhost','458236','Zekon1452','458236');
            if ($mysql->connect_error)
              die("Problemas con la conexion a la base de datos");
            $registros = $mysql->query("select COLUMN_TYPE from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='viviendas' and COLUMN_NAME='extras_vivienda'") or
              die($mysql->error);
            $reg = $registros->fetch_array();
            $enumList = explode(",", str_replace("'", "", substr($reg['COLUMN_TYPE'], 5, (strlen($reg['COLUMN_TYPE']) - 6))));
            echo '<select name="extras_vivienda">';
            foreach ($enumList as $value)
              echo '<option value="' . $value . '">' . $value . '</option>';
            echo '</select>';
            ?>
          </div>
          <div class="form-group">
            Foto vivienda:
            <input type="file" name="foto_vivienda" required>
          </div>
          <div class="form-group">
            Observaciones vivienda:
            <input type="text" name="observaciones_vivienda" required>
          </div>
          <div class="form-group">
            <input type="submit" value="Confirmar">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>