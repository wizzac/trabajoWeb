<?php
    if (isset($_POST['submit'])) {
        $texto = $_POST['texto'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];
        $opcion = $_POST['opcion'];
        $examen = $_POST['examen'];
        if (isset($_POST['location'])){
            $location = $_POST['location'];
        }
        
        $mysqli = new mysqli('127.0.0.1', 'root', '', 'moocsite');

        if ($mysqli->connect_errno) {
            echo '<script>
                alert("Lo sentimos, este sitio web está experimentando problemas.");
                </script>';
            exit;
        }

        $sql = "INSERT INTO pregunta(texto,valor,idCategoria,idOpcion,idExamen,estado) VALUES ('$texto','$valor','$categoria','$opcion','$examen',1);";
        if (!$resultado = $mysqli->query($sql)) {
            echo '<script>
                alert("Lo sentimos, este sitio web está experimentando problemas.");
                </script>';
            $mysqli->close();
            exit;
        }

        if ($resultado->affected_rows === 0) {
            echo "<script>
                alert('Lo sentimos. No se pudo crear la pregunta.');
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
