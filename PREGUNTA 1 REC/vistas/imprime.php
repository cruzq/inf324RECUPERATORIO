<link rel="stylesheet" href="estilos.css">
<h1>Comprobante de Pago</h1>
<?php  
    session_start();
    $ci = $_SESSION["ci"];
    $rol = $_SESSION["rol"];
    if ($rol === "kardex") { ?>
    <p>Esta pagina es para indicar al contibuyente que tiene su comprobante de pago</p>

<?php
    } else {
    $resultado=mysqli_query($link, "select * from impuesto.contribuyente where ci='$ci'");
    $fila=mysqli_fetch_array($resultado);
    if ($fila["recogo"]) {
        ?> 
        <h2>imprime comprobante!!!</h2>
        <?php
    }else{
?>
    <h2>Imprime la boleta de comprobante de impuesto</h2>
<?php 
}
}
?>