<?php
if(isset($_GET['doc1'])) {
    session_start();
    $documento = $_GET['doc1'];
    // echo $_SESSION["rol"];
	// echo $_SESSION["ci"];
    $ci = $_SESSION["ci"];

    $documento = "documentosEntregados";

    $link = mysqli_connect("localhost", "rcruz", "123456", "contribuyente"); 

    // Evitar la inyección de SQL usando consultas preparadas
    $query = "UPDATE contribuyente SET entrega = ? WHERE ci = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ss", $documento, $ci);
    
    if(mysqli_stmt_execute($stmt)) {
        echo "¡Actualización exitosa!";
    } else {
        echo "Error al ejecutar la actualización: " . mysqli_error($link);
    }
    
    // Enviar una respuesta de vuelta al JavaScript
    echo "¡Registrando, $documento! La solicitud fue exitosa.";
} else {
    echo "Hubo un error al procesar la solicitud.";
}
?>