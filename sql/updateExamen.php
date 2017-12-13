
<?php
    if (isset($_POST['submit'])) {
        $nota = $_POST['nota'];
        $descripcion = $_POST['descripcion'];
        $curso = $_POST['curso'];
        $fecha = $_POST['fecha'];
        $id = $_POST['id'];
        $estado = $_POST['estado'];

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

        $sql = "UPDATE examen SET VALUES 
                    nota = '$nota',
                    descripcion = '$descripcion',
                    curso = '$curso',
                    fecha = '$fecha',
                    estado = '$estado'
                WHERE id = $id;";
        if (!$resultado = $mysqli->query($sql)) {
            echo '<script>
                alert("Lo sentimos, este sitio web está experimentando problemas.");
                </script>';
            $mysqli->close();
            exit;
        }

        if ($resultado->affected_rows === 0) {
            echo "<script>
                alert('Lo sentimos. No se pudo actualizar el ex&aacute;men.');
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

