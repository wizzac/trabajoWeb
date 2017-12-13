<?php
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $resumen = $_POST['resumen'];


        if(isset($_POST['ayudante1'])){
            $ayudante1 = $_POST['ayudante1'];
        }else{
            $ayudante1 = NULL;
        }
  
        if(isset($_POST['ayudante2'])){
            $ayudante2 = $_POST['ayudante2'];
        }else{
            $ayudante2 = NULL;
        }
        
        if(isset($_POST['cupo'])){            
            $cupo = $_POST['cupo'];
        }else{
            $cupo =NULL;
        }

        if(isset($_POST['pago'])){            
            
            $pago = $_POST['pago'];
        }else{
            $pago = NULL;            
        }
        $preferencial = $_POST['preferencial'];

        if($preferencial==1){
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFin = $_POST['fechaFin'];
        }else{
            $fechaInicio = NULL;
            $fechaFin = NULL;                
        }

        if(isset($_POST['monto'])){                        
            $monto = $_POST['monto'];
        }else{
            $monto =NULL;
        }

        if (isset($_POST['location'])){
            $location = $_POST['location'];
        }

        $mysqli = new mysqli('127.0.0.1', 'root', '', 'final');

        if ($mysqli->connect_errno) {
            echo '<script>
                alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.");
                </script>';
            exit;
        }
        
        $sql = "INSERT INTO curso(nombre,resumen,ayudante1,ayudante2,cupo,fechaInicio,fechaFin,pa,preferencial,monto,estado) 
                        VALUES ('$nombre','$resumen','$ayudante1','$ayudante2','$cupo','$fechaInicio','$fechaFin','$pago','$preferencial','$monto',1);";
        
        if (!$resultado = $mysqli->query($sql)) {
            echo '<script>
                alert("Lo sentimos, este sitio web est&aacute; experimentando re problemas.");
                </script>';
            $mysqli->close();
            exit;
        }


        $mysqli->close();
        if (isset($_POST['location'])){
           header("Location: $location");
        }
    }
        

?>
