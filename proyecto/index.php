<?php  
 session_start();  
 $host = "servidores";  
 $username = "hospital";  
 $password = "root";  
 $database = "hospital";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["nombre"]) || empty($_POST["contra"]))  
           {  
                $message = '<label>Todos los campos son obligatorios</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM usuarios WHERE nombre = 'denilson' AND contra '234'";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'usuario'     =>     $_POST["nombre"],  
                          'pass'     =>     $_POST["contra"]  
                     )  
                );  
                  $count = $statement->rowCount();
                  $count2 = $statement->rowCount();
                switch ("$count" && "$count2") {
                  case "nombre" && "contra": 
                    if($count > 0)  
                {  
                     $_SESSION["nombre"] = $_POST["nombre"];  
                     header("location:Doctor/principal.php");  
                }  
                else  
                {  
                     $message = '<label>Informacion Incorrecta</label>';  
                }  
                    break;
                  
                  case "nombre" && "contra": 
                    if($count2 > 0)  
                {  
                     $_SESSION["nombre"] = $_POST["nombre"];  
                     header("location:Secretaria/principal.php");  
                }  
                else  
                {  
                     $message = '<label>Informacion Incorrecta</label>';  
                }  
                    break;
                }
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  

 
 ?> 

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Login</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h3 align="">Inicio de Sesion</h3><br />  
                <form method="post">  
                     <label>Usuario</label>  
                     <input type="text" name="nombre" class="form-control" required="" placeholder="ingrese su usuario" />  
                     <br />  
                     <label>Contraseña</label>  
                     <input type="pass" name="contra" class="form-control" required="" placeholder="ingrese su contraseña" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  