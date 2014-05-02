<?php
if(Session::getUID()==""){ echo header("Location:index.php?module=signin"); }
?>
<div class='row'>
	<div class='col-md-9'>

<h1><a href='index.php?module=selcategory' class='btn btn-primary pull-right'>Agregar un Negocio</a> Tus Negocios</h1>
<p>Selecciona uno de tus negocios.</p>
    <p class='alert alert-warning'>Ahora estas en modo administrador, puedes actualizar la informacion de tus negocios, publicar anuncios, etc ... regresar al <b><a href='index.php?module=home'>Modo Usuario</a></b></p>
<?php
if(count(DeckData::getAllByUID($user->id))==0){
	echo "<div class='alert alert-warning'><p>El espacio para tu negocio aun no esta finalizado!! Debes proporcionar la informacion mas importante de tu negocio para crear su espacio e indexarlo en la busqueda!!.</p>";
	echo "<a href='index.php?module=selcategory' class='btn btn-primary pull-right'>Agregar Informacion</a><div class='clearfix'></div></div>";
}
?>

<?php

$decks = DeckData::getAllByUID($user->id);
if(count($decks)>0):
?>
<hr>
<?php foreach($decks as $deck):?>
<h3><?php echo $deck->title; ?></h3>
<p><?php echo $deck->biografy; ?></p>
<div class="btn-group pull-right">
<a href='index.php?module=deck&id=<?php echo $deck->id; ?>' target="_blank" class='btn btn-default btn-lg '><i class="glyphicon glyphicon-eye-open"></i> Vista Previa</a>
<a href='index.php?module=admindeck&id=<?php echo $deck->id; ?>' class='btn btn-default btn-lg '><i class="glyphicon glyphicon-dashboard"></i> Administrar</a>
</div>
<div class='clearfix'></div>
<hr>
<?php endforeach; ?>
<?php else: ?>
<div class='jumbotron'>
    <h2>No hay negocios</h2>

</div>
<?php endif; ?>

	</div> 
	<!-- aqui termina el col-md-9 principal -->
        <div class="col-sm-3 col-md-3 user-details">
            <div class="user-image">
            <?php if($user->image!=""):?>
                <img src="http://www.gravatar.com/avatar/2ab7b2009d27ec37bffee791819a090c?s=100&d=mm&r=g" alt="Karan Singh Sisodia" title="Karan Singh Sisodia" class="img-circle">
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
<div class='clearfix'></div>
<br><div class="panel panel-default">
  <div class="panel-heading"><b>MineDeck Basico</b></div>
  <div class="panel-body">
    <p>Gestiona y personaliza 1 Negocio en MineDeck u obten espacio para otro negocio por solo: $520.00 (MX/MN)</p>
    <a href='' class='btn btn-primary btn-block'>Obtener</a>
  </div>
</div>
        </div>
</div>

            <div class='clearfix'></div>
<br><br><br><br>
<br><br><br><br>