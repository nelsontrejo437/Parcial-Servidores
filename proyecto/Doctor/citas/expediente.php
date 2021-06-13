
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Expediente</title>

   <link rel="stylesheet" type="text/css" href="../css/tabla.css">

    
  <!-- Page level plugin CSS-->
  
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>
<body>
        <?php 
        include ('database.php');
        $clientes = new Database();
        $listado=$clientes->read();
        ?>
        <?php 
          while ($row=mysqli_fetch_object($listado)){
            $id=$row->id;
            $nombres=$row->nombres." ".$row->apellidos;
            $telefono=$row->telefono;
            $edad=$row->edad;
            $direccion=$row->direccion;
            $descripcion=$row->descripcion;
            $nombre_madre=$row->nombre_madre;
            $nombre_padre=$row->nombre_padre;
            $genero=$row->genero;
            $fecha_nac=$row->fecha_nac;
            $fecha_consulta=$row->fecha_consulta;
            $lugar_nac=$row->lugar_nac;
            $observaciones=$row->observaciones;
            $tratamiento=$row->tratamiento;

        ?>
        <br>
        <br>
        <h2>Expedientes</h2><br>
                        <a href="charts.php" class="btn btn-info add-new" style="text-align:right;"><i class="fa fa-arrow-left"></i> Regresar</a>
        <center>
         <table border="1" class="" width="50">
          <tr>
            <th>Expediente
                        <td><?php echo $id;?></td></tr>
                    </th>
                       <tr>
                        <th>Nombres
                        <td><?php echo $nombres;?></td>
                    </th></tr>
                    <tr>
                        <th>Teléfono
                        <td><?php echo $telefono;?></td>
                    </th></tr>
                    <tr>
                        <th>Edad
                        <td><?php echo $edad;?></td>
                    </th></tr>
                    <tr>
                        <th>Dirección
                        <td><?php echo $direccion;?></td>
                    </th></tr>
                    <tr>
                        <th>Alergias
                        <td><?php echo $descripcion;?></td>
                    </th></tr>
                    <tr>
                        <th>Madre
                        <td><?php echo $nombre_madre;?></td>
                    </th></tr>
                    <tr>
                        <th>Padre
                        <td><?php echo $nombre_padre;?></td>
                    </th></tr>
                    <tr>
                        <th>Genero
                        <td><?php echo $genero;?></td>
                    </th></tr>
                    <tr>
                        <th>Fecha Nacimiento
                        <td><?php echo $fecha_nac;?></td>
                    </th></tr>
                    <tr>
                        <th>Fecha Consulta
                        <td><?php echo $fecha_consulta;?></td>
                    </th></tr>
                    <tr>
                        <th>Lugar Nacimiento
                        <td><?php echo $lugar_nac;?></td>
                    </th></tr>
                    <tr>
                        <th>Observaciones
                        <td><?php echo $observaciones;?></td>
                    </th></tr>
                    <tr>
                        <th>Tratamiento
                        <td><?php echo $tratamiento;?></td>
                    </th></tr>
                        </td>
                    </tr> 
                    </tr>
                </thead>
        <?php
          }
        ?>
                </tbody>
            </table>
        </center>
        <br>
        <br>
        <br>
            <script src="../js/bootstrap.min.js"></script>
</body>
</html>