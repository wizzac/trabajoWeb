<?php
session_start();

if (isset($_COOKIE['logged'])) {	
	if($_COOKIE['logged']==true){
			//esta logueado
			$usuario=$_COOKIE['usuarioId'];
			$mysqli = new mysqli('127.0.0.1', 'root', '', 'final');
			$sql = "select * from usuario where estado=1 and id='$usuario';";
			$resultado=$mysqli->query($sql);
			foreach($resultado as $registro){
				echo "<label>"; 
				echo "<h4><b>Logueado usuario: $registro[email]</h4></b>";
				echo "</label>";

				echo "<label class='pull-right'>"; 
				echo "<h4><b><a href='logout.php'>Logout</a></b></h4>";
				echo "</label>";
				echo "<br>";	
				
			}
				

			
	}else{
 //mostrar modal otra vez error true o algo 	
 echo "no logueado";
	}	
}else{
}

?>


<head>
<title>-- Re Cursitos--</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- start slider -->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/fontawesome.min.css">

<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<script type="text/javascript" src="js/jquery.cslider.js"></script>
	<script type="text/javascript">
			$(function() {

				$('#da-slider').cslider({
					autoplay : true,
					bgincrement : 450
				});

			});
		</script>
<!-- Owl Carousel Assets -->
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
		<script>
			$(document).ready(function() {

				$("#owl-demo").owlCarousel({
					items : 4,
					lazyLoad : true,
					autoPlay : true,
					navigation : true,
					navigationText : ["", ""],
					rewindNav : false,
					scrollPerPage : false,
					pagination : false,
					paginationNumbers : false,
				});

			});
		</script>
		<!-- //Owl Carousel Assets -->
<!----font-Awesome----->
   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!----font-Awesome----->
</head>
<body>
<div class="header_bg">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a href="index.php">Re Cursitos </a></h1>
		</div>
	
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="container">
	<div class="row h_menu">
		<nav class="navbar navbar-default navbar-left" role="navigation">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="index.php">Home</a></li>
		        <li><a href="technology.php">Cursos</a></li>
		        <li><a href="about.php">Nosotros</a></li>
						<li><a href="blog.php">Blog</a></li>
						<li><a id="myBtn">Login</a></li>
		        <li><a href="contact.php">Contacto</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		    <!-- start soc_icons -->
		</nav>
		<div class="soc_icons navbar-right">
	
		</div>
	</div>

	<?php

include("modal.html");
?>

<script>

$("#myBtn").click(function(){
        $("#myModal").modal();
    });

</script>	