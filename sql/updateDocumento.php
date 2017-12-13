<?php
    if (isset($_POST['submit'])) {
        $modulo = $_POST['modulo'];
        $curso = $_POST['curso'];
        $url = $_POST['url'];
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

        $sql = "UPDATE documento SET VALUES
                    idModulo = '$modulo',
                    idCurso = '$curso',
                    url = '$url',
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
                alert('Lo sentimos. No se pudo actualizar el documento.');
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
