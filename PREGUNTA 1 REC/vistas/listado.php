<link rel="stylesheet" href="estilos.css">
<h1>Entrega de documentos</h1>
<?php  
    session_start();
    $ci = $_SESSION["ci"];
    $rol = $_SESSION["rol"];
    $resultado=mysqli_query($link, "select * from impuesto.contribuyente where ci='$ci'");
    $fila=mysqli_fetch_array($resultado);
    if ($rol === "cajero2") { ?>
        <p>Esta pantalla es para que el estudiante entregue sus documentos</p>
    <?php }else{ 
    if ($fila["entrega"]) {
        ?> 
            <h2>Usted ya entrego su documento!!!</h2>
        <?php
    }else{
?>
<style>
    .form{
        width: 80%;
        margin-inline:auto;
        display:flex;
        flex-direction:column;
        gap:1rem;
        align-items:center;
        border:1px dashed black;
        padding:1rem;
    }
    
</style>
<div class="form">
    <div class="form-group">
        <label for="doc1">Documento1</label>
        <input type="text" name="doc1" id="doc1">
    </div>
    <button id="miEnlace">Entregar</button>
</div>

<script>
    document.getElementById('miEnlace').addEventListener('click', function(event) {
    event.preventDefault(); // Evita el comportamiento predeterminado del enlace
    
    const nombre = document.getElementById('doc1').value; // Tu valor de nombre
    
    fetch(`vistas/actions/entregaDocumentos.php?doc1=${nombre}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Hubo un problema con la petición.');
            }
            return response.text(); // Obtener la respuesta como texto
        })
        .then(data => {
            console.log('Respuesta del servidor:', data);
            alert("Registro exitoso")
            document.getElementById("formulario").submit();
            console.log("pasa algo");
            // Hacer algo con la respuesta recibida
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

</script>
<?php 
}
}
?>
