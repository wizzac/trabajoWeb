<?php
    if (isset($_POST['submit'])) {
        $curso = $_POST['curso'];
        $contenido = $_POST['contenido'];
        $parentId = $_POST['parentId'];
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
        
        if (isset($_POST['parentIdCurso'])){
            $parentIdCurso = $_POST['parentIdCurso'];
            $sql = "UPDATE opcion SET VALUES curso = '$curso',contenido= '$contenido',parentId= '$parentId',parentIdCurso= '$parentIdCurso',estado= '$estado' WHERE id = $id;";
        }else{
            $sql = "UPDATE opcion SET VALUES curso = '$curso',contenido= '$contenido',parentId= '$parentId',estado= '$estado' WHERE id = $id;";
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
