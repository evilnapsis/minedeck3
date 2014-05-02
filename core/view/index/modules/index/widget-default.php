<div class='row'>
<div class='col-md-12'>
<div class='jumbotron'>
	<div class='container'>
<!--
	<div class='col-md-2 col-xs-4'>
	<img src='logo.png' class='img-responsive'>
	</div> 
-->
	<div class='col-md-12 col-xs-10'>
	<h2>MineDeck Directory</h2>
	<p>Te ofrecemos un amplio directorio de servicios, productos, lugares y ofertas en M&eacute;xico.</p>
	<a href='index.php?module=register' class='btn btn-primary btn-lg pull-right'>Registrate Gratis !!</a>
	<div class='clearfix'></div>
	</div>
	</div>
</div>
	<p class='alert alert-info'>Te invitamos a agregar tu negocio en nuestro directorio, los usuarios que se inscriban en nuestro periodo de pruebas Beta obtendran de regalo el  <b>Plan MineDeck Pro</b> por tiempo ilimitado. <a href='index.php?module=buy'><b>Consulta planes y promociones.</b></a> y Si tienes dudas <a href='index.php?module=contact'><b>Contactanos</b>.</a></p>

</div>
</div>
<div class='row'>
<div class='col-md-9 col-xs-8 col-sm-9'>
<div class='row'>
	<div class='col-md-8'>
			<div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Mas Vistos</h3>
                </div>
                <?php
                $decks = DeckViewData::getAll();
                ?>
                	<div class="list-group">
                	<?php foreach($decks as $deck):?>
						<a href='index.php?module=deck&id=<?php echo $deck->deck_id;?>' class='list-group-item'><span class='badge badge-default pull-right'><i class='glyphicon glyphicon-eye-open'></i> <?php echo $deck->total; ?></span> <?php echo $deck->getDeck()->title;?></a>
					<?php endforeach; ?>
					</div>

            </div>
	</div>

	<div class='col-md-4'>

			<div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Recientes</h3>
                </div>
                <?php
		        $decks = DeckData::getAllRecent(5);

		        ?>
					<div class="list-group">
					<?php foreach($decks as $deck):?>
						<a href='index.php?module=deck&id=<?php echo $deck->id;?>' class='list-group-item'> <?php echo $deck->title; ?></a>
					<?php endforeach; ?>
					</div>
            </div>

	</div>
</div>
<div class='row'>
	<div class='col-md-12'>
		<div class="panel panel-primary">
		        <div class="panel-heading">		          
				<div class="panel-title">Categorias</div>
		        </div>
		        <div class="panel-body">
	<?php
	$categories = CategoryData::getAll();
	$subcategories = SubcategoryData::getAll();

	foreach($categories as $category){
		echo "<b>".$category->name."</b> ";
		$subcategories = SubcategoryData::getAllByCategoryId($category->id);
		foreach($subcategories as $subcategory){
			echo " <a href=''>".$subcategory->name."</a> ";
		}
	}
	?>

				</div>		
		</div>
	</div>

</div>
</div>
	<div class='col-md-3 col-xs-4 col-sm-3'>
		<div class="panel panel-default">
		        <div class="panel-heading">		          
				<div class="panel-title">Tu anuncio aqui</div>
		        </div>
		        <div class="panel-body">
		        <p>haz que seas mas visible para tu publico, obten privilegios...</p>
		        <a href='' class='btn btn-default btn-block'>Aprender como</a>

				</div>		
		</div>
		<div class="panel panel-default">
		        <div class="panel-heading">		          
				<div class="panel-title">NeoWelder Labs</div>
		        </div>
		        <div class="panel-body">
		        <p>Desarrollo de paginas y sistemas web y mobiles.</p>
		        <a href='' class='btn btn-default btn-block'>Visitar</a>

				</div>		
		</div>
		<div class="panel panel-default">
		        <div class="panel-heading">		          
				<div class="panel-title">NeoWelder Labs</div>
		        </div>
		        <div class="panel-body">
		        <p>Desarrollo de paginas y sistemas web y mobiles.</p>
		        <a href='' class='btn btn-default btn-block'>Visitar</a>

				</div>		
		</div>
	

		</div>

</div>
</div>

<br><br><br>