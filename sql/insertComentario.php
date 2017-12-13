<?php
    if (isset($_POST['submit'])) {
        $curso = $_POST['curso'];
        $contenido = $_POST['contenido'];
        $parentId = $_POST['parentId'];

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
        
        if (isset($_POST['parentIdCurso'])){
            $parentIdCurso = $_POST['parentIdCurso'];
            $sql = "INSERT INTO opcion(curso,contenido,parentId,parentIdCurso,estado) VALUES ('$curso','$contenido','$parentId','$parentIdCurso',1);";
        }else{
            $sql = "INSERT INTO opcion(curso,contenido,parentId,estado) VALUES ('$curso','$contenido','$parentId',1);";
        }
        
        if (!$resultado = $mysqli->query($sql)) {
            echo '<script>
                alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.");
                </script>';
            $mysqli->close();
            exit;
        }

        if ($resultado->affected_rows === 0) {
            echo "<script>
                alert('Lo sentimos. No se pudo crear el comentario $contenido.');
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
