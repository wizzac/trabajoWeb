<?php
    if (isset($_POST['submit'])) {
        $curso = $_POST['curso'];
        $usuario = $_POST['usuario'];
        $horas = $_POST['horas'];
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
        
        $sql = "UPDATE certificado SET VALUES idCurso = '$curso',idUsuario = '$usuario,horas = $horas,estado = '$estado' WHERE id = $id;
                        VALUES ('$curso',$usuario,$horas,1);";
        
        if (!$resultado = $mysqli->query($sql)) {
            echo '<script>
                alert("Lo sentimos, este sitio web est&aacute; experimentando problemas.");
                </script>';
            $mysqli->close();
            exit;
        }

        if ($resultado->affected_rows === 0) {
            echo "<script>
                alert('Lo sentimos. No se pudo actualizar el certificado.');
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
