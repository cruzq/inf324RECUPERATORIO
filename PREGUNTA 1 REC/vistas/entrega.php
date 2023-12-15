<link rel="stylesheet" href="estilos.css">
<h1>Entrega documento</h1>
<?php  
    session_start();
    $ci = $_SESSION["ci"];
    $rol = $_SESSION["rol"];

    if ($rol === "kardex") { ?>

        <p>Esta pantalla el contribuyente entrega los documentos</p>
<?php
    } else {
    $resultado=mysqli_query($link, "select * from imprime.contribuyente where ci='$ci'");
    $fila=mysqli_fetch_array($resultado);
    if ($fila["comprobante"]) {
        ?> 
        <h2>Usted ya entrego su documento!!!</h2>
        <?php
    }else{
?>
    <div class="form">
        <div class="form-group">
            <label for="doc1">Comprobante</label>
            <input type="text" name="doc1" id="doc1">
        </div>
        <button id="miEnlace">Entregue su documento</button>
    </div>
<?php 
}
}
?>