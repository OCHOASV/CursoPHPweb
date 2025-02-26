<?php
    include 'conn.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM contactos WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>
    <label>Teléfono:</label>
    <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" required><br>
    <label>Email:</label>
    <input type="email" name="correo" value="<?php echo $row['correo']; ?>" required><br>
    <button type="submit">Actualizar</button>
</form>