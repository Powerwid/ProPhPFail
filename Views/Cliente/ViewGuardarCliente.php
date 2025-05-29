<!DOCTYPE html>
<html lang="es">
<head>
    <title>Guardar Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { width: 50%; margin: 0 auto; }
        input[type="text"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 3px; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 3px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h2>Guardar Cliente</h2>
    <form action="index.php?controller=cliente&accion=guardar" method="post">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellidos" placeholder="Apellidos" required>
        <input type="text" name="dni" placeholder="DNI" required>
        <input type="text" name="celular" placeholder="Celular" required>
        <input type="text" name="direccion" placeholder="Dirección" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>