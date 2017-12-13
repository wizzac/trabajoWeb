<?php
    if (isset($_POST['submit'])) {
        $opcion = $_POST['opcion'];
        $pregunta = $_POST['pregunta'];
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

        $sql = "UPDATE opcion SET VALUES 
                    texto = '$opcion',
                    idPregunta = '$pregunta',
                    estado = '$estado'
                WHERE id = $id;";
        if (!$resultado = $mysqli->query($sql)) {
            echo '<script>
                alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.");
                </script>';
            $mysqli->close();
            exit;
        }

        if ($resultado->affected_rows === 0) {
            echo "<script>
                alert('Lo sentimos. No se pudo actualizar la opci&oacute;n $opcion.');
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
