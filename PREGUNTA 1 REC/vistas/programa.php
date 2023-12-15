<link rel="stylesheet" href="estilos.css">
<h1>Programar fecha de cuando volver a presentar su documento</h1>
<?php  
    session_start();
    $ci = $_SESSION["ci"];
    $rol = $_SESSION["rol"];

    if ($rol === "cajero2") { ?>

    <div class="form">
        <div class="form-group">
            <label for="doc1">Programe la fecha de presentacion con ci xx </label>
            <input type="date" name="doc1" id="doc1">
        </div>
        <button id="miEnlace">Programar Fecha</button>
    </div>

<?php
    } else {
    $resultado=mysqli_query($link, "select * from impuesto.contribuyente where ci='$ci'");
    $fila=mysqli_fetch_array($resultado);
    if ($fila["programacion"]) {
        ?> 
        <h2>Usted debe volver en la fecha XX:XX:XXXX!!!</h2>
        <?php
    }else{
        ?>
    <p>Espere a que el cajero programe la fecha de cuando volver</p>
<?php 
}
}
?>