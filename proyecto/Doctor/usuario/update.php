<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Usuarios</title>
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
                    <div class="col-sm-8"><h2>Editar <b>Usuarios</b></h2></div>
                    <div class="col-sm-4">
                        <a href="usuarios.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("database.php");
				$clientes= new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$nombre = $clientes->sanitize($_POST['nombre']);
					$apellido = $clientes->sanitize($_POST['apellido']);
					$contra = $clientes->sanitize($_POST['contra']);
					$id_cliente=intval($_POST['id']);
					$res = $clientes->update($nombre, $apellido, $contra, $id_cliente);
					if($res){
						header("location: usuarios.php?res=insertado");
						$message= "Datos actualizados";
						$class="alert alert-warning";
						
					}else{
						$message="No se pudo actualizar";
						$class="alert alert-warning";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_cliente=$clientes->single_record($id);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_cliente->nombre;?>">
					<input type="hidden" name="id" id="id" class='form-control' maxlength="100"   value="<?php echo $datos_cliente->id;?>">
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="apellido" id="apellido" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->apellido;?>">
				</div>
				<div class="col-md-6">
					<label>Contrase??a:</label>
					<input type="text" name="contra" id="contra" class='form-control' maxlength="15" required value="<?php echo $datos_cliente->contra;?>">
				</div>
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-secondary">Actualizar</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            