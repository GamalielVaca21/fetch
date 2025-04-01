<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "manhattan";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT nombre, apellido, foto FROM friends";
$result = $conn->query($sql); 

if ($result) {
    if ($result->num_rows > 0) { 
        while ($row = $result->fetch_assoc()) {
            echo "Nombre: " . $row["nombre"] . "<br>";
            echo "Apellido: " . $row["apellido"] . "<br>";
            
            if (!empty($row['foto'])) {
                echo '<td><img height="50px" src="data:image/jpg;base64,' . base64_encode($row['foto']) . '"></td><br><br>';
            } else {
                echo '<td>No hay imagen disponible</td>';
            }
        }
    } else {
        echo "No se encontraron resultados.";
    }
} else {
    echo "Error en la consulta: " . $conn->error;
}

$conn->close();
?>
