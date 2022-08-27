<!doctype html>
<html lang="en">

<head>
    <title>Viviendas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .table td{
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID Vivienda</th>
                            <th>Tipo</th>
                            <th>Zona</th>
                            <th>Direccion</th>
                            <th>Dormitorios</th>
                            <th>Precio</th>
                            <th>Tamaño</th>
                            <th>Extras</th>
                            <th>Imagen</th>
                            <th>Observaciones</th>
                            <th>Borrar</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "db.php";
                        $con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);
                        $query = "SELECT * FROM viviendas;";
                        $res = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id_vivienda']; ?></td>
                                <td><?php echo $row['tipo_vivienda']; ?></td>
                                <td><?php echo $row['zona_vivienda']; ?></td>
                                <td><?php echo $row['direccion_vivieda']; ?></td>
                                <td><?php echo $row['ndormitorios_vivienda']; ?></td>
                                <td><?php echo $row['precio_vivienda']; ?></td>
                                <td><?php echo $row['tamano_vivienda']; ?></td>
                                <td><?php echo $row['extras_vivienda']; ?></td>
                                <td>
                                    <img width="100" src="data:jpg; ?>;base64,<?php echo  base64_encode($row['foto_vivienda']); ?>">
                                </td>
                                <td><?php echo $row['observaciones_vivienda']; ?></td>
                              <?php echo '<td><a href="delete.php?id_vivienda='.$row['id_vivienda'].'">Borrar?</a>'; ?>
                              <?php echo '<td><a href="modify1.php?id_vivienda='.$row['id_vivienda'].'">Modificar?</a>'; ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tr><td colspan="12">
                    <a href="insert1.php">Agrega un nuevo articulo</a>
                    </td></tr>
                </table>
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