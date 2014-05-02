<br><?php
if(Session::getUID()==""){ echo header("Location:index.php?module=signin"); }
?>
<div class='row'>
	<div class='col-md-9'>	
<?php
if($user->is_active==0){
    echo "<p class='alert alert-warning'><i class='glyphicon glyphicon-envelope'></i> Esta cuenta se encuentra en proceso de verificacion, favor de verificar via correo electronico. <a href='#'>Ver proceso de verificacion</a>.</p>";
}
if(count(DeckData::getAllByUID($user->id))==0){
	echo "<div class='alert alert-warning'><p>El espacio para tu negocio aun no esta finalizado!! Debes proporcionar la informacion mas importante de tu negocio para crear su espacio e indexarlo en la busqueda!!.</p>";
	echo "<a href='index.php?module=selcategory' class='btn btn-primary pull-right'>Agregar Informacion</a><div class='clearfix'></div></div>";
}
?>
<!--
		<div class="row">
				
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="offer offer-radius offer-primary">
						<div class="shape">
							<div class="shape-text">
														
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead"><a href='index.php?module=home'><i class='glyphicon glyphicon-ok'></i> Modo Usuario</a></h3>						
							<p>En modo usuario puedes gestionar tus productos, servicios, anuncios favoritos.</p>
						</div>
					</div>
				</div>	
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="offer offer-radius offer-default">
						<div class="shape">
							<div class="shape-text">
																
							</div>
						</div>
						<div class="offer-content">
							<h3 class="lead">
                            <h3 class="lead"><a href='index.php?module=admin'>Modo Administrador</a></h3>                      
							</h3>
							<p>En modo administrador puedes publicar tus propios productos, servicios y anuncios.</p>
						</div>
					</div>
				</div>
			</div>
-->
<div class="btn-group">
<a href="#" class='btn btn-default'><i class='glyphicon glyphicon-ok'></i> Siguiendo</a>
<a href="#" class='btn btn-default'><i class='glyphicon glyphicon-star'></i> Favoritos</a>
<a href="#" class='btn btn-default'><i class='glyphicon glyphicon-thumbs-up'></i> Recomendados</a>
<a href="#" class='btn btn-default'><i class='glyphicon glyphicon-time'></i> Recientes</a>

  <div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      <i class='glyphicon glyphicon-th-list'></i> Listas
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li></li>
      <li><a href="#">No hay listas</a></li>
      <li class="divider"></li>
      <li><a href="#">Crear lista</a></li>
    </ul>
  </div>
</div>



<br><br>
<?php

$siguiendo = DeckFollowerData::getAllByUID(Session::getUID());

foreach($siguiendo as $item){
    $deck = $item->getDeck();
    print "<a href='' class='btn btn-default btn-sm pull-right'><i class='glyphicon glyphicon-remove'></i> Dejar de Seguir</a>";
    
    print "<div style='font-size:30px;'><a style='color:black;text-decoration:none;' href='index.php?module=deck&id=$deck->id'>".$deck->title."</a></div>";
    print "<p>".$deck->biografy."</p>";

    print "<div class='help-block pull-right'>";
    print "<a style='color:black;text-decoration:none;' class='tip' title='".DeckViewData::countByProfileId($deck->id)." Vistas'>".DeckViewData::countByProfileId($deck->id)." <i class='glyphicon glyphicon-eye-open'></i></a>";
    print "&nbsp;&nbsp;&nbsp;<a style='color:black;text-decoration:none;' class='tip' title='".DeckFollowerData::countByDeckId($deck->id)."  Seguidores'>".DeckFollowerData::countByDeckId($deck->id)." <i class='glyphicon glyphicon-ok-sign'></i></a>";
    print "</div>";
    print "<div class='clearfix'></div>";
    print "<hr>";

}

?>

















	</div> 
	<!-- aqui termina el col-md-9 principal -->
		<div class="col-sm-3 col-md-3 user-details">
            <div class="user-image">
            <?php if($user->image!=""):?>
                <img src="storage/<?php echo Session::getUID(); ?>/image/<?php echo $user->image; ?>" alt="Karan Singh Sisodia" title="<?php echo $user->name; ?>" style='width:100px;height:100px;' class="img-circle img-responsive">
            <?php else:?>
                <img src="res/images/user.png" style='width:100px' alt="Karan Singh Sisodia" title="Karan Singh Sisodia" class="img-circle">
            <?php endif;?>
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3><?php echo $user->name." ".$user->lastname;?></h3>
                </div>
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information">
                            <span class="glyphicon glyphicon-ok"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings">
                            <span class="glyphicon glyphicon-star"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#email">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </a>
                    </li>
                  
                </ul>

            </div>
            <div class="clearfix"></div>
<br><p class="alert alert-success">Cambiar a <a href="index.php?module=admin"><b>Modo Administrador</b></a></p>
        </div>
</div>
            <div class='clearfix'></div>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>