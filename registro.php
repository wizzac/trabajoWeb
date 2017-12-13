<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
				  	<h2>Registro</h2>
					    <form method="POST" action="./sql/insertUsuario.php" onSubmit='return validar()'>
					    	<div class="col-md-6">
						    	<span>name</span>
						    	<span><input type="text" class="form-control" name="nombre"></span>
						    </div>
						    <div class="col-md-6">
						    	<span>apellido</span>
						    	<span><input type="text" class="form-control" name="apellido"></span>
						    </div>
							<div class="">
						    	<span>dni</span>
						    	<span><input type="number" class="form-control" name="dni"></span>
						    </div>
						    <div>
						    	<span>e-mail</span>
						    	<span><input type="email" class="form-control" name="email"></span>
						    </div>	
							<div>
						    	<span>clave</span>
						    	<span><input type="password" class="form-control" id="clave1" name="clave"></span>
						    </div>
							<div>
						    	<span>confirmar clave</span>
						    	<span><input type="password" class="form-control"name id="clave2"></span>
						    </div>
							<input type="hidden" name="location" value="../index.php">
						   <div>
						   		<label class="fa-btn btn-1 btn-1e"><input type="submit" name="submit" value="Registrar"></label>
						  </div>
						  
					    </form>
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

	function validar(){

		var clave1=$('#clave1').val();
		var clave2=$('#clave2').val();
		if(clave1!=clave2){
			alert("Las contraseñas no coinciden");
			return false;
		}else{
			return true
		}
	}
</script>
</html>