<html>
 <head>
 <title>Proyecto IoT - Nodo</title>
 </head>
 <body>
 <?php
 $nodo = $_POST["nodo"];
 ?>
 <h1>Proyecto IoT</h1>
 <h2>Datos del Nodo <?php echo $nodo; ?> y la variable peso del contenedor de alimento </h2>
 <table border="2px">
 <tr><th>VALOR</th><th>FECHA</th></tr>
 <?php
 //$url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=BBFF-F4LeAXFSWfxfWMAO39o1w5dbpIKbY2";//verificar
 $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/distancia/lv?token=BBFF-F4LeAXFSWfxfWMAO39o1w5dbpIKbY2";//verificar
 $curl = curl_init($url_rest);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 $respuesta = curl_exec($curl);

 if($respuesta===false){
    curl_close($curl);
    die ("Hola, pasó un Error...");
    }
    curl_close($curl);
    //echo $respuesta;
    $resp = json_decode($respuesta);
    $result = $resp -> results;
    $tam = count($result);
    for ($i=0; $i<$tam; $i++){
    $j = $result[$i];
    $valor = $j -> value;
    $time = $j -> timestamp;
    $fecha = date('d-m-Y H:i:s', $time);
    echo "<tr><td>$valor</td><td>$fecha</td></tr>";
    }
    ?>
    </table>
    
    <a href="seleccion.html">Volver</a><br>
    </body>
   </html>