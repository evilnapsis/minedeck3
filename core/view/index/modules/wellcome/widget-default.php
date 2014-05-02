<br><br><br>
<?php if(isset($_COOKIE['maillogged'])):?>
<div class='row'>
	<div class='col-md12'>
<br><br>		
	<div class='jumbotron'>
		<h2>Bienvenido a MineDeck</h2>
		<p>Te hemos enviado a tu correo <b><?php echo $_COOKIE['maillogged']; ?></b> las instrucciones para activar tu cuenta MineDeck. Puedes inicar sesion en el sistema pero necesitaras completar el proceso de activacion para desbloquear algunas caracteristicas.</p>
		<a href='index.php?module=signin' class='btn btn-primary btn-lg pull-right'>Iniciar Sesion</a>
		<div class='clearfix'></div>
	</div>
	
	</div>
</div>
<?php else:?>
<div class='row'>
	<div class='col-md12'>
<br><br>		
	<div class='jumbotron'>
		<h2>Bienvenido a MineDeck</h2>
		<a href='index.php?module=signin' class='btn btn-primary btn-lg pull-right'>Iniciar Sesion</a>
		<div class='clearfix'></div>
	</div>
	
	</div>
</div>
<?php endif; ?>

<br><br>
<div class="row destacados">
		<div class="col-md-4">
    		<div>
				<img src="http://lorempixel.com/200/200/abstract/1/" alt="Texto Alternativo" class="img-circle img-thumbnail">
				<h2>Servicios</h2>
				<p>Registra tu tienda, tu restaurant, lavado de autos, etc.</p>
			</div>
		</div>

		<div class="col-md-4">
			<div>
				<img src="http://lorempixel.com/200/200/abstract/2/" alt="Texto Alternativo" class="img-circle img-thumbnail">
				<h2>Productos</h2>
				<p>Agrega tu lista de productos a tu espacio virtual.</p>
			</div>
		</div>

		<div class="col-md-4">
			<div>
				<img src="http://lorempixel.com/200/200/abstract/3/" alt="Texto Alternativo" class="img-circle img-thumbnail">
				<h2>Anuncios</h2>
				<p>Publica tus anuncios, ofertas especiales y remates...</p>
			</div>
		</div>
		</div>
