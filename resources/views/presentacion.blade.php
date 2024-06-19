<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="estilos.css" type="text/css"/>
    <title>Document</title>
</head>
<body>
    <h1>PÁGINA WEB  ANDY</h1>
    <p>Cambia el siguiente nombre:</p>
    <p id="nombre">Andrea</p>

    <button onclick="cambiaNombre()">Nuevo nombre</button>

    <script>
        function cambiaNombre(){
            const elementoNombre = document.getElementById('nombre');
            elementoNombre.innerHTML='IVONNE :)';
        }
    </script>

</body>
</html>