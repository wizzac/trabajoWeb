<?php
    if (isset($_POST['submit'])) {
        $curso = $_POST['curso'];
        $usuario = $_POST['usuario'];
        $horas = $_POST['horas'];

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
        
        $sql = "INSERT INTO certificado(idCurso,idUsuario,horas,estado) 
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
                alert('Lo sentimos. No se pudo crear el certificado.');
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
