<?php
    if (isset($_POST['submit'])) {
        $titulo = $_POST['titulo'];
        $contenido = $_post['contenido'];
        $curso = $_POST['curso'];
        $estado =1;
        
        if (isset($_POST['location'])){
            $location = $_POST['location'];
        }
        
        $mysqli = new mysqli('127.0.0.1', 'root', '', 'esta');

        if ($mysqli->connect_errno) {
            echo "<script>
                alert('Lo sentimos, este sitio web está experimentando problemas.');
                </script>";
            exit;
        }

        $sql = "INSERT INTO modulo(idCurso,titulo,contenido,estado) VALUES ('$curso','$titulo','$contenido','$estado');";
        if (!$resultado = $mysqli->query($sql)) {
            echo "<script>
                alert('Lo sentimos, este sitio web está experimentando problemas.');
                </script>";
            $mysqli->close();
            exit;
        }

        if ($resultado->affected_rows === 0) {
            echo "<script>
                alert('Lo sentimos. No se pudo insertar el modulo');
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
