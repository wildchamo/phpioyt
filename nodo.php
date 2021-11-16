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
 <h2>Datos del Nodo <?php echo $nodo; ?> y la variable peso del contenedor de alimento </h2>
 <?php
 //$url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=BBFF-F4LeAXFSWfxfWMAO39o1w5dbpIKbY2";//verificar
 $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/peso/lv?token=BBFF-F4LeAXFSWfxfWMAO39o1w5dbpIKbY2";//verificar
 $url_rest2 = "https://things.ubidots.com/api/v1.6/devices/$nodo/llenar/lv?token=BBFF-F4LeAXFSWfxfWMAO39o1w5dbpIKbY2";//verificar
 $curl = curl_init($url_rest);
 $curl2 = curl_init($url_rest2);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
 $respuesta = curl_exec($curl);
 $respuesta2 = curl_exec($curl2);

 if($respuesta===false){
    curl_close($curl);
    die ("Hola, pasó un Error...");
    }
    curl_close($curl);
    //echo $respuesta;
    echo "<p>Actualmente el dispensador tiene $respuesta %</p>";

    if($respuesta2 <= 50){
       echo "<p> Es necesario que llenes el dispensador pronto <p/>";
    }else{
       echo "<p>Puedes dejar el dispensador sin llenar mas tiempo</p>";
    }

    ?>
    
    <a href="seleccion.html">Volver</a><br>
 </section>

    </body>
   </html>