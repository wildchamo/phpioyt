<html>
 <head>
 <title>Proyecto IoT - Nodo</title>
 <link rel="stylesheet" href="nodo.css">
 </head>
 <body>
 <?php
 $nodo = $_POST["nodo"];
 ?>
 <section>
 <h1>Proyecto IoT</h1>
 <h2>Datos del Nodo <?php echo $nodo; ?> y la variable temperatura del dispositivo </h2>
 <?php
 //$url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=BBFF-F4LeAXFSWfxfWMAO39o1w5dbpIKbY2";//verificar
 $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/temperatura/lv?token=BBFF-F4LeAXFSWfxfWMAO39o1w5dbpIKbY2";//verificar
 $url_rest2 = "https://things.ubidots.com/api/v1.6/devices/$nodo/llenar/lv?token=BBFF-F4LeAXFSWfxfWMAO39o1w5dbpIKbY2";//verificar
 $curl = curl_init($url_rest);
 $curl2 = curl_init($url_rest2);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
 $respuesta = curl_exec($curl);

 if($respuesta===false){
    curl_close($curl);
    die ("Hola, pasó un Error...");
    }
    curl_close($curl);
    //echo $respuesta;
    echo "<p>Actualmente el dispensador esta a $respuesta °C</p>";

    if($respuesta <= 29){
       echo "<p> Este dispositivo no requiere mantenimiento <p/>";
    }else{
       echo "<p>Contacte lo mas pronto posible al dueño de este dispositivo</p>";
    }

    ?>
    
    <a href="seleccion2.html">Volver</a><br>
 </section>

    </body>
   </html>