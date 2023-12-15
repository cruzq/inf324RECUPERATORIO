<?php 
$link=mysqli_connect("localhost","rcruz","123456","workflow1");
session_start();
$rol=$_SESSION["rol"];
$usuario=$_SESSION["ci"];

if ($rol === 'cajero2') { 
	$sql="SELECT * FROM seguimiento where fechahorafin is null";
}else{
	$sql="SELECT * FROM seguimiento where usuario='".$usuario."' and fechahorafin is null";
}

$resultado=mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<main>
		<h1>Seguimiento <?php echo $rol ?> </h1>
	<table border="1px" style="min-width:300px; border-collapse:collapse;">
		<tr>
			<td style="padding:1rem;" >flujo</td>
			<td style="padding:1rem;" >proceso</td>
			<td style="padding:1rem;" >Accion</td>
		</tr>	
<?php
while ($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";
	echo "<td>$fila[flujo]</td>";
	echo "<td>$fila[proceso]</td>";
	echo "<td><a href='pantalla.php?flujo=$fila[flujo]&proceso=$fila[proceso]'>Ver</a></td>";
	echo "</tr>";
}

?>
</main>
</body>
</html>