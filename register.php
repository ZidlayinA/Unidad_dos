<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya fue tomado.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <title>webwing</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
<div id="contact" class="contact ">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h1><strong class="yellow" style="font-size: 40px;">Registro de usuarios</strong></h1>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-8 offset-md-2">
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="post_form" class="contact_form">
                <div class="row">
                   <div class="col-md-12 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                      <input class="contact_control" placeholder="Ingrese su usuario" type="text" name="username" value="<?php echo $username; ?>">
                      <span class="help-block"><?php echo $username_err; ?></span>
                   </div>
                   <div class="col-md-12 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                      <input class="contact_control" placeholder="Ingrese su contraseña" type="password" name="password" value="<?php echo $password; ?>">
                      <span class="help-block"><?php echo $password_err; ?></span>
                   </div>
                   <div class="col-md-12 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                      <input class="contact_control" placeholder="Confirme su contraseña" type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                      <span class="help-block"><?php echo $confirm_password_err; ?></span>
                   </div>
                   <div class="col-md-12">
                      <!--button class="send_btn">Ingresar</button-->
                      <input type="submit" class="send_btn" value="Ingresar">
                   </div>
                   <p>¿Ya tienes una cuenta? <a href="register.php">Ingresa aquí</a>.</p>
             </form>
          </div>
       </div>
    </div>
 </div>
</body>
</html>