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
				  	<h2>Crear Curso</h2>
					    <form method="POST" action="./sql/insertCurso.php" onSubmit='return validarCurso()'>
					    	<div>
						    	<span>Nombre</span>
						    	<span><input type="text" class="form-control" name="nombre"></span>
						    </div>
							<div class="">
						    	<span>Resumen</span>
						    	<span><textarea class="form-control" name="resumen"></textarea></span>
						    </div>
							<div class='col-md-6'>
						    	<span>Fecha inicio</span>
						    	<span><input type="date" class="form-control" name="fechaInicio" id="fechaInicio"></span>
						    </div>
							<div class='col-md-6'>
						    	<span>Fecha Fin</span>
						    	<span><input type="date" class="form-control" name="fechaFin" id="fechaFin"></span>
						    </div>
						    <span>Pago</span>	
							<div class='col-md-5'>
						    	<span><input type="radio" class="form-control" name="pago" id="pagoTrue" onChange="habilitarMonto()" checked value="1"><label>Si</label></span>
						    </div>
							<div class='col-md-5'>
						    	<span><input type="radio" class="form-control"name="pago" id="pagoFalse" onChange="habilitarMonto()" value="0"><label>No</label></span>
						    </div>

							<div class='col-md-5'>
							<span>Preferencial</span>	
						    	<span><input type="radio" class="form-control" name="preferencial" id="preferencialTrue" onChange="habilitarCupo()" checked value="1"><label>Si</label></span>
						    </div>
							<div class='col-md-5'>
							<span>&nbsp;</span>	
						    	<span><input type="radio" class="form-control"name="preferencial" id="preferencialFalse" onChange="habilitarCupo()" value="0"><label>No</label></span>
						    </div>

							<div class='col-md-6'>
						    	<span>Precio</span>
						    	<span><input type="number" class="form-control" name="monto" id="monto" value="0" ></span>
						    </div>
							<div class='col-md-6'>
							<span>Cantidad Cupos</span>
						    	<span><input type="number" class="form-control" id="cupo" name="cupo" value="0"></span>
							</div>
							
			

							<input type="hidden" name="location" value="../crearModulo.php">
						   <div class="row">
						   		<label class="fa-btn btn-1 btn-1e"><input type="submit" name="submit" value="Crear"></label>
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

		function habilitarMonto(){
			if($("#pagoTrue").prop("checked")){
				$("#monto").prop("disabled",false)
			}else{
				$("#monto").prop("disabled",true)
				$("#monto").val(0)
				
			}
		}

		
		function habilitarCupo(){
			if($("#preferencialTrue").prop("checked")){
				$("#cupo").prop("disabled",false)
				$("#fechaInicio").prop("disabled",false)
				$("#fechaFin").prop("disabled",false)
			}else{
				$("#cupo").prop("disabled",true)
				$("#fechaInicio").prop("disabled",true)
				$("#fechaFin").prop("disabled",true)
				$("#cupo").val(0)
			}
		}

	
</script>
</html>