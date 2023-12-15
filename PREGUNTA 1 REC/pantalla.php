<?php
// http://localhost/work/pantalla.php?flujo=F1&proceso=P1
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$link=mysqli_connect("localhost","rcruz","123456","workflow1"); 
$resultado=mysqli_query($link, "select * from flujo where flujo='$flujo' and proceso='$proceso'");
$fila=mysqli_fetch_array($resultado);
$proceso=$fila["proceso"];
$procesosiguiente=$fila["procesosiguiente"];
$pantalla=$fila["pantalla"];
$archivo="vistas/".$fila["pantalla"].".php";
echo 'El archivo : '.$archivo;
?>
<form action="motor.php" method="GET" id="formulario">
<input type="hidden" name="pantalla" value="<?php echo $pantalla;?>"/>
<input type="hidden" name="flujo" value="<?php echo $flujo;?>"/>
<input type="hidden" name="proceso" value="<?php echo $proceso;?>"/>
<input type="hidden" name="procesosiguiente" value="<?php echo $procesosiguiente;?>"/>
<?php
include $archivo;
?>
<?php if ($proceso!=="P1") {
   echo '<input type="submit" id="anterior" name="Anterior" value="Anterior">';
} ?>
<?php if ($procesosiguiente!==null) {
    echo '<input type="submit" id="siguiente" name="Siguiente" value="Siguiente">';
} ?>
</form>

