<?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        
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
        $sql = "select * from usuario where estado=1 and email like '$email' and clave like '$clave';";
 
        if (!$resultado = $mysqli->query($sql)) {
            echo "<script>
                    alert('Lo sentimos, este sitio web está experimentando problemas.');
                </script>";
            $mysqli->close();
            exit;
        }
        
        if($resultado ->num_rows > 0){
            //logueado por 3 dias 
            $date_of_expiry = time() + 60 * 60 * 24 * 3 ;
            foreach($resultado as $registro){    
                $idUsuario=$registro[id];    
                
                $idRol;
                $sql2 = "select * from usuariorol where estado=1 and idUsuario=$idUsuario;";
                $resultado2 = $mysqli->query($sql2);
                foreach($resultado2 as $registro2){   
                    $idRol=$registro2[idRol];   
                } 
                
                $sql3 = "select * from rol where id=$idRol;";
                $resultado3 = $mysqli->query($sql3);
                
                foreach($resultado3 as $registro3){

                    setcookie("rol",$registro3[nombre],$date_of_expiry);
                }           
                
                setcookie( "logged", true,$date_of_expiry);

                setcookie('usuarioId',$idUsuario,$date_of_expiry);


            if (isset($_POST['location'])){
                header("Location: $location");
             }
            }

        }

        $mysqli->close();
      
    }
?>
