    <div id="blog" class="row">                 
        <div class="col-sm-2 paddingTop20">
            <nav class="nav-sidebar nav-right">
                <ul class="nav">
                    <li class="active"><a href="javascript:;"><span class="glyphicon glyphicon-time"></span> Recientes</a></li>
                    <li><a href="javascript:;"><span class="glyphicon glyphicon-eye-open"></span> Mas Vistas</a></li>
                    <li><a href="javascript:;"><span class="glyphicon glyphicon-send"></span> Mas Seguidas</a></li>
                    <li><a href="javascript:;"><span class="glyphicon glyphicon-thumbs-up"></span> Recomendadas</a></li>
                    <li><a href="javascript:;"><span class="glyphicon glyphicon-ok"></span> Mas Aceptadas</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="javascript:;"><i class="glyphicon glyphicon-th-list"></i> Crear lista</a></li>
                </ul>
            </nav>
        </div>
                 <div class="col-md-10 blogShort">
                 <h2><i class='glyphicon glyphicon-time'></i> Recientes</h2>
                    <div class="row">
                    <div class='col-md-8'>
<?php
//////////////////////
$decks = DeckData::getAllRecent(12);
if(count($decks)>0):
?>
<hr>
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
<h4><a href='index.php?module=deck&id=<?php echo $deck->id; ?>'><?php echo $deck->title; ?></a></h4>
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
<?php else: ?>
<div class='jumbotron'>
    <h2>No hay negocios</h2>

</div>
<?php endif;
////////////////////
 ?>
                    </div>

                         
                    </div>
                </div>        
             </div>
<br><br><br><br><br>
