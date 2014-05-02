     <div class="row">
       <?php
if($deck->getLogo()!=""){
  print '<div class="col-md-2">';
  print "<center><img src='".$deck->getLogo()."' style='width:55px;' class='img-responsive'></center>";
  print "</div>";
}

?>

     <div class="col-md-10">
     <div style='font-size:40px;'>
    <a href='index.php?module=deck&id=<?php echo $deck->id; ?>' target="_blank" class='btn btn-default pull-right'><i class='glyphicon glyphicon-eye-open'></i> Vista Previa</a>
     <?php echo $deck->title; ?> <small style="color:#888;font-size:20px;">Modo administrador</small></div>
</div>
</div>

     <p class='alert alert-info'><i class='glyphicon glyphicon-cog'></i> Estas en modo administrador, si respondes o publicas algo sera en nombre de <b><?php echo $deck->title; ?></b></p>

<?php if($deck->image==""):?>
    <p class='alert alert-info'><i class='glyphicon glyphicon-picture'></i> No has agregado una imagen para tu negocio, te recomendamos agregar una, en el menu configuracion.</p>
<?php endif; ?>

<?php if($deck->latitud==""&& $deck->longitud==""):?>
    <p class='alert alert-info'> <i class='glyphicon glyphicon-map-marker'></i> No has agregado la ubicacion de tu negocio, te recomendamos agregarla, en el menu configuracion.</p>
<?php endif; ?>

<?php if($deck->about==""&& $deck->mision==""&& $deck->vision==""&& $deck->founded_at==""):?>
    <p class='alert alert-info'><i class='glyphicon glyphicon-list-alt'></i> Debes completar la informacion de tu empresa : mision, vision, fecha de fundacion, ...</p>
<?php endif; ?>


<div class="btn-group">
  <button type="button" class="btn btn-default"><i class='glyphicon glyphicon-align-justify'></i> Nueva Noticia</button>
  <button type="button" class="btn btn-default"><i class='glyphicon glyphicon-shopping-cart'></i> Nuevo Producto</button>
  <button type="button" class="btn btn-default"><i class='glyphicon glyphicon-magnet'></i> Clasificados</button>
</div>
<br>
<br>
<div class='jumbotron'>
    <h2>En construccion</h2>
    <p>En este momento estamos trabajando en varias secciones del sitio, incluyendo esta, le rogamos paciencia...</p>
</div>
