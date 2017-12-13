<?php
    if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $cantModulos = $_POST['cantModulos'];
        $ayudante1 = $_POST['ayudante1'];
        $ayudante2 = $_POST['ayudante2'];
        $cupo = $_POST['cupo'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $pago = $_POST['pago'];
        $preferencial = $_POST['preferencial'];
        $monto = $_POST['monto'];
        $id = $_POST['id'];
        $estado = $_POST['estado'];


        if (isset($_POST['location'])){
            $location = $_POST['location'];
        }

        $mysqli = new mysqli('127.0.0.1', 'root', '', 'moocsite');

        if ($mysqli->connect_errno) {
            echo '<script>
                alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.");
                </script>';
            exit;
        }
        
        $sql = "UPDATE curso SET VALUES 
                    nombre = $nombre,
                    cantModulos = $cantModulos,
                    ayudante1 = $ayudante1,
                    ayudante2 = $ayudante2,
                    cupo = $cupo,
                    fechaInicio = $fechaInicio,
                    fechaFin = $fechaFin,
                    pago = $pago,
                    preferencial = $preferencial,
                    monto = $monto,estado = $estado) 
                 WHERE id = $id;
        
        if (!$resultado = $mysqli->query($sql)) {
            echo '<script>
                alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.");
                </script>';
            $mysqli->close();
            exit;
        }

        if ($resultado->affected_rows === 0) {
            echo "<script>
                alert('Lo sentimos. No se pudo actualizar el curso $nombre.');
                </script>";
            $mysqli->close();
            exit;
        }

        $resultado->free();
        $mysqli->close();
        if (isset($_POST['location'])){
           header("Location: $location");
        }
    }
        

?>
