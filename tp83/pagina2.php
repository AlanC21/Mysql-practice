<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Consulta de artículos</title>
  <style>
    .tablalistado {
      border-collapse: collapse;
      box-shadow: 0px 0px 8px #000;
      margin: 20px;
    }

    .tablalistado th {
      border: 1px solid #000;
      padding: 5px;
      background-color: #ffd040;
    }

    .tablalistado td {
      border: 1px solid #000;
      padding: 5px;
      background-color: #ffdd73;
    }
  </style>
</head>

<body>

  <?php
  $mysql = new mysqli("localhost", "root", "", "lindavista");
  if ($mysql->connect_error)
    die("Problemas con la conexión a la base de datos");

  $registros = $mysql->query("select id_vivienda, tipo_vivienda, zona_vivienda, 
    direccion_vivieda, ndormitorios_vivienda, precio_vivienda, tamano_vivienda,
    extras_vivienda, foto_vivienda, observaciones_vivienda
    from viviendas order by precio_vivienda asc[codigo]") or
    die($mysql->error);

  if ($reg = $registros->fetch_array()) {
    echo '<table class="tablalistado">';
    echo '<tr><th>id_vivienda</th><th>tipo_vivienda</th><th>zona_vivienda</th><th>direccion_vivieda</th><th>ndormitorios_vivienda</th><th>precio_vivienda</th><th>tamano_vivienda</th><th>extras_vivienda</th><th>foto_vivienda</th><th>observaciones_vivienda</th></tr>';
      echo '<tr>';
      echo '<td>';
      echo $reg['id_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['tipo_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['zona_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['direccion_vivieda'];
      echo '</td>';
      echo '<td>';
      echo $reg['ndormitorios_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['precio_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['tamano_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['extras_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['foto_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['observaciones_vivienda'];
      echo '</td>';
      echo '</tr>';
    echo '<table>';
  } else
    echo 'No existe un artículo con dicho código';

  $mysql->close();

  ?>
</body>

</html>
