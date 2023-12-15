<?php
$link=mysqli_connect("localhost","rcruz","123456","workflow1"); 
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$procesosiguiente=$_GET["procesosiguiente"];
$pantalla=$_GET["pantalla"];

echo "flujo:".$flujo."<br></br>";
echo "proceso:".$proceso."<br></br>";
echo "procesoSiguiente:".$procesosiguiente."<br></br>";
echo "pantalla:".$pantalla."<br></br>";


// include $pantalla.".back.inc.php";

// if (isset($_GET["pregunta"]))
// {
//     $resultado=mysqli_query($link, "select * from flujopregunta where flujo='$flujo' and proceso='$proceso'");
    
//     $fila=mysqli_fetch_array($resultado);
//     if ($_GET["pregunta"]=='si')
//     {
//         $procesosiguiente=$fila["si"];
//     }
//     else 
//     {
//         $procesosiguiente=$fila["no"];
//     }
// }

if (isset($_GET["Anterior"]) && isset($_GET["pregunta"]))
{   
    echo "pregunta anterior";
    $resultado=mysqli_query($link, "SELECT * FROM flujo WHERE procesosiguiente='$proceso'");
    $fila=mysqli_fetch_array($resultado);
    $procesosiguiente=$fila["proceso"];
    
} else// ver este proceso
if (isset($_GET["Siguiente"]) && isset($_GET["pregunta"]))
{
    echo "pregunta siguiente";
    //echo $_GET["pregunta"];
    if ($_GET["pregunta"] == 'si') {
        echo "es un si";
        $resultado=mysqli_query($link, "SELECT * from flujopregunta where proceso='$proceso'");
        $fila=mysqli_fetch_array($resultado);
        echo ".....".$fila["si"]; // nuestro proceso actual
        $procesosiguiente=$fila["si"];
        $newValue = $fila["flujo"][0] . (intval($fila["flujo"][1]) + 1); //F2
        echo $newValue;
        $flujo=$newValue;
    }else{
        $flujo="F1";
        $procesosiguiente="P1";
    }
    
}else if (isset($_GET["Anterior"]))
{
    echo "estoy en anterior";
    $resultado=mysqli_query($link, "SELECT * FROM flujo WHERE procesosiguiente='$proceso'");
    $fila=mysqli_fetch_array($resultado);
    $procesosiguiente=$fila["proceso"];
    $flujo=$fila["flujo"];
    echo "<br></br>";
    print_r($fila); 
    echo "<br></br>";
    echo $fila["pantalla"];
}else if (isset($_GET["Siguiente"])) {
    echo "estoy en siguiente";
    $resultado=mysqli_query($link, "SELECT * FROM flujo WHERE flujo='$flujo' and procesosiguiente='$procesosiguiente'");
    $fila=mysqli_fetch_array($resultado);
    // $procesosiguiente=$fila["proceso"];
    echo "<br></br>";
    print_r($fila); 
    echo "<br></br>";
    echo $fila["pantalla"];
}


header("Location: pantalla.php?flujo=$flujo&proceso=$procesosiguiente")
?>