
<?php
    if (isset($_POST['submit'])) {
        $nota = $_POST['nota'];
        $descripcion = $_POST['descripcion'];
        $curso = $_POST['curso'];
        $fecha = $_POST['fecha'];
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

        $sql = "INSERT INTO examen(nota,descripcion,curso,fecha,estado) VALUES ('$nota','$descripcion','$curso','$fecha',1);";
        if (!$resultado = $mysqli->query($sql)) {
            echo '<script>
                alert("Lo sentimos, este sitio web está experimentando problemas.");
                </script>';
            $mysqli->close();
            exit;
        }

        if ($resultado->affected_rows === 0) {
            echo "<script>
                alert('Lo sentimos. No se pudo crear el ex&aacute;men.');
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

