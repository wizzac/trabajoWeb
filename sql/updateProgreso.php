<?php
    if (isset($_POST['submit'])) {
        $usuario = $_POST['usuario'];
        $modulo = $_POST['modulo'];
        $estado =$_POST['estado'];
        $id=$_POST['id'];
        
        if (isset($_POST['location'])){
            $location = $_POST['location'];
        }
        
        $mysqli = new mysqli('127.0.0.1', 'root', '', 'final');

        if ($mysqli->connect_errno) {
                echo "<script>
                alert('Lo sentimos, este sitio web está experimentando problemas.');
                </script>";
            exit;
        }

        $sql = "update progreso set idUsuario='$usuario',idModulo='$modulo',estado='$estado' where id='$id';";
        if (!$resultado = $mysqli->query($sql)) {
            echo "<script>
                alert('Lo sentimos, este sitio web está experimentando problemas.');
                </script>";
            $mysqli->close();
            exit;
        }

        if ($resultado->affected_rows === 0) {
            echo "<script>
                alert('Lo sentimos. No se pudo actualizar el progreso');
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
