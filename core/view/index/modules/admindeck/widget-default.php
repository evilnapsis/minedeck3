<?php
$deck = DeckData::getById($_GET['id']);

?>
 <div id="blog" class="row"> 
     <div class="col-md-10 blogShort">
<?php
if(!isset($_GET['action'])){
  include "action/_dash_.php";
}else {
  $action = $_GET['action'];
    if($action!="dash" &&  $action!="followers"&&  $action!="questions"){
  }else {
    include "action/_".$action."_.php";   
  }
}
?>
    </div>
<div class="col-sm-2 paddingTop20">

        <nav class="nav-sidebar nav-left">
            <ul class="nav">
                <li class="active"><a href="index.php?module=admindeck&id=<?php echo $deck->id ?>"><span class="glyphicon glyphicon-home"></span> Novedades</a></li>
                <li><a href="javascript:;">Productos</a></li>
                <li><a href="javascript:;">Anuncios</a></li>
                <li><a href="index.php?module=admindeck&id=<?php echo $deck->id ?>&action=followers">Seguidores</a></li>
                <li><a href="index.php?module=admindeck&id=<?php echo $deck->id ?>&action=questions">Preguntas</a></li>
                <li><a href="javascript:;">Estadisticas</a></li>
                <li><a href="index.php?module=configdeck&id=<?php echo $deck->id ?>">Configuracion</a></li>
                <li class="nav-divider"></li>
                <li><a href="index.php?module=home"><i class="glyphicon glyphicon-off"></i> Salir</a></li>
            </ul>
        </nav>
    </div>
</div>
<br><br><br><br>