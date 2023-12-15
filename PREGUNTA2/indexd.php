<?php
// Conexión a la base de datos (ejemplo utilizando mysqli)
$servername = "localhost";
$username = "rcruz";
$password = "123456";
$dbname = "academico2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT 
            Materia,
            SUM(CASE WHEN Califivcacion >= 60 THEN 1 ELSE 0 END) AS AlumnosAprobados,
            SUM(CASE WHEN Califivcacion < 60 THEN 1 ELSE 0 END) AS AlumnosReprobados
        FROM calificaciones
        GROUP BY Materia";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Alumnos por Materia</title>
    <!-- Cualquier estilo CSS o scripts adicionales -->
</head>
<body>
    <h1>Reporte de Alumnos por Materia</h1>
    
    <table border="1">
        <tr>
            <th>Materia</th>
            <th>Alumnos Aprobados</th>
            <th>Alumnos Reprobados</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Mostrar datos de cada materia
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['Materia']."</td>";
                echo "<td>".$row['AlumnosAprobados']."</td>";
                echo "<td>".$row['AlumnosReprobados']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No se encontraron registros.</td></tr>";
        }
        ?>
    </table>

    <!-- Otro contenido o funcionalidad adicional -->

</body>
</html>

<?php
// Cerrar conexión a la base de datos
$conn->close();
?>
