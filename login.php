<?php 
session_start();
require_once 'cnn.php';
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - MagtimusPro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    
                    <form method="post" action="" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="correo" id="correo">
                        <input type="password" placeholder="Contraseña" name="contrasena" id="contrasena">
                        <button type="submit" name="enviar" id="enviar">Entrar</button>
                    </form>

                    <!--Register-->
                    <form method="post" action="" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombre completo" name="nombre" id="nombre">
                        <input type="email" placeholder="Correo Electronico" name="correo" id="nombre">
                        <input type="text" placeholder="Usuario" name="usuario" id="usuario">
                        <input type="password" placeholder="Contraseña" name="contrasena" id="contrasena">
                        <button type="submit" name="registrar" id="registrar"> Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>

<?php

     //Valida que el usuario hizo clik en el Boton
    if (isset($_POST['registrar'])) 
    {
   
    require_once "cnn.php";
 
    //Trae datos del formulario
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena'];
    
   
    
        //Validar que las cajas no esten vacias
        if (!empty($nombre) && !empty($correo) && !empty($usuario) && !empty($contrasena))
            {
              //Insertar datos en la tabla de la db  
               $sql=$cnnPDO->prepare( "INSERT INTO unidad_dos
                (nombre, correo, usuario, contrasena ) VALUES (:nombre, :correo, :usuario, :contrasena)");
            
              //Asignar el contenido de las variables a los parametros
              $sql->bindParam(':nombre',$nombre);
              $sql->bindParam(':correo',$correo); 
              $sql->bindParam(':usuario',$usuario); 
              $sql->bindParam(':contrasena',$contrasena);  
               
              
              
              //Ejecutar la variable $sql
              $sql->execute();
              unset($sql);
              unset($cnnPDO);

               header('Location:login.php'); 
        
         
        
          }
    }

    ?>

<?php
   
   require_once 'cnn.php';
   
   if (isset($_POST['enviar'])) {
   
       $correo=$_POST['correo'];
       $contrasena=$_POST['contrasena'];
   
   if (!empty($correo) && !empty($contrasena)) {
   
       $query=$cnnPDO->prepare('SELECT * FROM unidad_dos WHERE correo=:correo AND contrasena=:contrasena');
   
       $query->bindParam(':correo',$correo);
       $query->bindParam(':contrasena',$contrasena);
   
      $query->execute();
   
       $count=$query->rowCount();
       
       if ($count){
           $_SESSION['correo']=$correo;
           header("Location:portafolio/inicio.php");
       }
       else{
           echo  '<div class="alert bg-success" role="alert" data-mdb-color="successs">
           <i class="fas fa-times-circle me-3"></i>Usuario o contraseña incorrectos. Vuelve a intentarlo. </div>';
   
       }
   
      }
   }
   
   ?>