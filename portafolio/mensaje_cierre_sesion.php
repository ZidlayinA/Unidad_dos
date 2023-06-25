<!DOCTYPE html>
<html>
<head>
    <title>Sesión cerrada</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        h1 {
            color: #333;
        }
        
        p {
            color: #666;
        }
    </style>
    <script>
        // Muestra una alerta al cargarse la página
        window.onload = function() {
            alert("¡La sesión ha sido cerrada!");
        };
    </script>
</head>
<body>
    <div class="container">
        <h1>Sesión cerrada</h1>
        <p>La sesión se ha cerrado correctamente.</p>
    </div>
</body>
</html>