<?php
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

        $sql = "update usuario set estado='0' where id='$id';";
        
        if (!$resultado = $mysqli->query($sql)) {
            echo "<script>
                alert('Lo sentimos, este sitio web está experimentando problemas.');
                </script>";
            $mysqli->close();
            exit;
        }


        $mysqli->close();
        if (isset($_POST['location'])){
           header("Location: $location");
        }
        

?>
