<?php 
$decks = DeckData::getSearch($_GET['q'],12);

?>
    <div id="blog" class="row">                 
        <div class="col-sm-2 paddingTop20">
            <nav class="nav-sidebar nav-right">
                <ul class="nav">
                    <li class="active"><a href="javascript:;"><span class="glyphicon glyphicon-search"></span> Busqueda ...</a></li>
                    <li><a href="index.php?module=recent"><span class="glyphicon glyphicon-time"></span> Recientes</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="javascript:;"><i class="glyphicon glyphicon-th-list"></i> Crear lista</a></li>
                </ul>
            </nav>
        </div>
                 <div class="col-md-10 blogShort">
                 <h3><i class='glyphicon glyphicon-search'></i> Buscar: <?php echo $_GET['q'];?></h3>
                    <div class="row">
                    <div class='col-md-8'>
<?php
//////////////////////
if(count($decks)>0):
?>
<hr>
<p class='alert alert-info'>Mostrando <?php echo count($decks); ?> resultados</p>
<?php foreach($decks as $deck):?>
<div class="row">
<div class='col-md-2'>
  <?php
if($deck->getLogo()!=""){
  print "<center><img src='".$deck->getLogo()."' style='width:60px;' class='img-responsive  '></center>";
}
?>

</div>
<div class="col-md-10">
<div style='font-size:35px;'><a style='color:#222;text-decoration:none;' href='index.php?module=deck&id=<?php echo $deck->id; ?>'><?php echo $deck->title; ?></a></div>
<p><?php echo $deck->biografy; ?></p>
<p><?php echo $deck->address; ?> <b><?php echo $deck->phone; ?></b></p>
<div class='row'>
<div class='col-md-6'>
<ol class="breadcrumb">
  <li><a href="#"><?php 
  $scat = $deck->getSubcategory();
  echo $scat->getCategory()->name;
  ?></a></li>
  <li><a href="#"><?php echo $scat->name; ?></a></li>
</ol>
</div>
</div>
</div>
</div>

<hr>

<?php endforeach; ?>
<?php if(count($decks)<8):?>
<p class='alert alert-warning'>Al parecer no hay suficientes resultados, verifica tus palabras de busqueda.</p>
<p class='alert alert-warning'>Tal vez conozcas a alguien o tengas un familiar que ofrezca un servicio parecido al que buscas, ayudalo a darse reelevancia, recomiendale <b>MineDeck</b>.</p>
<?php endif;?>

<?php else: ?>

<div class='jumbotron'>
    <h2>No hay negocios</h2>

</div>
<?php endif;
////////////////////
 ?>
                    </div>
                    <div class='col-md-4'>
    <div class="panel panel-primary">
            <div class="panel-heading">             
        <div class="panel-title">Desarrollo de Software</div>
            </div>
            <div class="panel-body">
            <p><b>NeoWelder Lab</b> , desarrollamos proyectos de software para pequeñas y medianas empresas.</p>
            <a href='http://neowelder.com' class='btn btn-default btn-block'>Visitanos</a>

        </div>    
    </div>
    <div class="panel panel-default">
            <div class="panel-heading">             
        <div class="panel-title">Tu anuncio aqui</div>
            </div>
            <div class="panel-body">
            <p>Dale relevancia a tu negocio, crea una campaña publicitaria especial.</p>
            <a href='' class='btn btn-default btn-block'>Crear campaña</a>

        </div>    
    </div>

                    </div>
                         
                    </div>
                </div>        
             </div>
<br><br><br><br><br>
