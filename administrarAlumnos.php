<!DOCTYPE HTML>
<html>
<?php

include('header.php');

?>
	<div class="main_bg"><!-- start main -->
	<div class="container">

	</div>
</div><!-- end main -->
<div class="main_btm"><!-- start main_btm -->
	<div class="container">
		<div class="main row">
			    <div class="col-md-3 company_ad">
				</div>
				<div class="col-md-7">
				  <div class="contact-form">
				  	<h2>Administrar Alumnos</h2>
                        <div class="row">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $cont=0;
                                            $mysqli = new mysqli('127.0.0.1', 'root', '', 'final');                                            
                                            $sql = "select * 
                                                    from usuario 
                                                    where id not in (select idUsuario 
                                                                     from usuariorol where idRol=(select id 
                                                                     from rol where nombre='ALUMNO'))
                                                     and estado='1';";
                                                if (!$resultado = $mysqli->query($sql)) {
                                                    echo '<script>
                                                            alert("Lo sentimos, este sitio web esta; experimentando problemas.");
                                                        </script>';
                                                    $mysqli->close();
                                                    exit;
                                                }
                                        
                                                foreach($resultado as $registro){
                                                    $cont++;
                                                    echo "<tr>";
                                                        echo "<td>$cont</td>";
                                                        echo "<td>$registro[nombre]</td>";
                                                        echo "<td>$registro[apellido]</td>";
                                                        echo "<td>$registro[email]</td>";
                                                        echo "<form method='POST' id='formUsDel$registro[id]' action='./sql/deleteUsuario.php' onSubmit='return confirmarBaja()'>";
                                                        echo "<input id='hidDel$registro[id]' name='location' type='hidden' value='../administrarAlumnos.php'></input>";                                                        
                                                        echo "<input id='hidDel2$registro[id]' name='id' type='hidden' value='$registro[id]'></input>";                                                                                                                
                                                        echo "<td><button class='clickeable btn' id='btnDel$registro[id]' value='$registro[id]'><i class='fa fa-times'></i></button></td>";
                                                        echo "</form>";
                                                    echo "</tr>";
                                                } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
				    </div>
  			</div>		
  			<div class="clearfix"></div>		
	</div> 
</div>
</div>
<div class="footer_bg"><!-- start footer -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<p class="link"><span>&#169; All rights reserved | Design by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
			</div>
		</div>
	</div>
</div>
</body>

<script>


    function confirmarBaja(){
        if(!confirm("Esta seguro que desea eliminar este usuario?")){
            return false
        }
    }
</script>
</html>