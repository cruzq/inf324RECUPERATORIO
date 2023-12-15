<link rel="stylesheet" href="estilos.css">
<h1>Verificacion de documentos</h1>
<?php  
    session_start();
    $ci = $_SESSION["ci"];
    $rol = $_SESSION["rol"];
    $resultado=mysqli_query($link, "select * from impuesto.contribuyente where ci='$ci'");
    $fila=mysqli_fetch_array($resultado);
    
    if ($rol === "cajero2") { ?>
    <select name="pregunta" id="pregunta">
        <option value="si">SI</option>
        <option value="no">NO</option>
    </select>
    <button>Registrar</button>
    <?php }else{ 
    /* ---- POR ESTUDIANTE ---- */
    if ($fila["verifica"]) {
        ?> 
            <input type="text" name="pregunta" id="pregunta" value="si" hidden style="display:none;">
            <h2>Usted ya fue habilitado para entregar el comprobante!!!</h2>
        <?php
    }else{
?>
<!-- <input type="text" value="si" name="pregunta"/> -->
        <input type="text" name="pregunta" id="pregunta" value="si" hidden style="display:none;">
        <p>Sus documentos deben ser verificados por el cajero</p>
<?php 
}
}
?>