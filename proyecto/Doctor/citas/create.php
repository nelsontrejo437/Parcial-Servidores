<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Doctor</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Agregar <b>Paciente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="charts.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$clientes= new Database();
				if(isset($_POST) && !empty($_POST)){
					$nombres = $clientes->sanitize($_POST['nombres']);
					$apellidos = $clientes->sanitize($_POST['apellidos']);
					$telefono = $clientes->sanitize($_POST['telefono']);
					$edad = $clientes->sanitize($_POST['edad']);
					$direccion = $clientes->sanitize($_POST['direccion']);
					$descripcion = $clientes->sanitize($_POST['descripcion']);
					$madre = $clientes->sanitize($_POST['nombre_madre']);
					$padre = $clientes->sanitize($_POST['nombre_padre']);
					$genero = $clientes->sanitize($_POST['genero']);
					$fecha_nac = $clientes->sanitize($_POST['fecha_nac']);
					$fecha_consulta = $clientes->sanitize($_POST['fecha_consulta']);
					$lugar_nac = $clientes->sanitize($_POST['lugar_nac']);
					$observaciones = $clientes->sanitize($_POST['observaciones']);
					$tratamiento = $clientes->sanitize($_POST['tratamiento']);
					
					$res = $clientes->create($nombres, $apellidos, $telefono, $edad, $direccion, $descripcion, $madre,$padre, $genero, $fecha_nac, $fecha_consulta, $lugar_nac, $observaciones, $tratamiento);
					if($res){
						$message= "Datos insertados con ??xito";
						$class="alert alert-success";
					}else{
						$message="No se pudieron insertar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
	
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombres" id="nombres" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Tel??fono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required >
				</div>
				<div class="col-md-6">
					<label>Edad:</label>
					<input type="number" name="edad" id="edad" class='form-control' maxlength="15" required >
				</div>
				<div class="col-md-12">
					<label>Direcci??n:</label>
					<textarea  name="direccion" id="direccion" class='form-control' maxlength="255" required></textarea>
				</div>
				<div class="col-md-12">
					<label>Descripcion:</label>
					<textarea type="text" name="descripcion" id="descripcion" class='form-control' maxlength="255" required></textarea>
				</div>
				<div class="col-md-6">
					<label>Nombre de la Madre:</label>
					<input type="text" name="nombre_madre" id="nombre_madre" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Nombre del Padre:</label>
					<input type="text" name="nombre_padre" id="nombre_padre" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Genero:</label>
					<input type="text" name="genero" id="genero" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Fecha de Nacimiento:</label>
					<input type="date" name="fecha_nac" id="fecha_nac" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Fecha de Consulta:</label>
					<input type="date" name="fecha_consulta" id="fecha_consulta" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Lugar De Nacimiento:</label>
					<input type=text name="lugar_nac" id="lugar_nac" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-12">
					<label>Observaciones:</label>
					<textarea type="text" name="observaciones" id="observaciones" class='form-control' maxlength="255" required></textarea>
				</div>
				<div class="col-md-12">
					<label>Tratamiento:</label>
					<textarea type="text" name="tratamiento" id="tratamiento" class='form-control' maxlength="255" required></textarea>
				</div>
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            