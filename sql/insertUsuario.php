<?php
    if (isset($_POST['submit'])) {

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        $estado =1;
        
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

        $sql = "INSERT INTO usuario(nombre,apellido,dni,email,clave,estado) VALUES ('$nombre','$apellido','$dni','$email','$clave','$estado');";
        if (!$resultado = $mysqli->query($sql)) {
            echo "<script>
                alert('Lo sentimos, este sitio web está experimentando problemas.');
                </script>";
            $mysqli->close();
            exit;
        }else{
            $ultimo=$mysqli->insert_id;

            $sql2 = "INSERT INTO usuariorol(idRol,idUsuario,estado) VALUES ((select id from rol where nombre like 'ALUMNO'),'$ultimo','$estado');";
            $resultado = $mysqli->query($sql2);

        }
        $mysqli->close();
        if (isset($_POST['location'])){
           header("Location: $location");
        }
    }
        

?>
