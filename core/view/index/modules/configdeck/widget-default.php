<?php
$deck = DeckData::getById($_GET['id']);
?>
 <div id="blog" class="row"> 
     <div class="col-md-10 blogShort">
     <div style='font-size:30px;'>
    <a href='index.php?module=admindeck&id=<?php echo $deck->id; ?>' class='btn btn-default pull-right'><i class='glyphicon glyphicon-chevron-left'></i> Regresar</a>
     <?php echo $deck->title; ?> <small style='color:#ddd;font-size:18px;'>Configuraci&oacute;n</small></div>
     <p class='alert alert-info'>Estas en modo administrador, si respondes o publicas algo sera en nombre de <b><?php echo $deck->title; ?></b></p>
<?php if(isset($_COOKIE['infoupdated'])):?>
    <p class='alert alert-info'><i class='glyphicon glyphicon-ok-sign'></i> La informaci&oacute;n ha sido actualizada exitosamente !!</p>
<?php
setcookie('infoupdated','',time()-18600);
 endif; ?>
<div class='row'>
<?php
if(!isset($_GET['action'])){
  include "action/_info_.php";
}else {
  $action = $_GET['action'];
    if($action!="info" && $action!="select" && $action!="edit" && $action!="location" && $action!="about" && $action!="social" && $action!="logo" && $action!="activity" && $action!="followers" && $action!="products" && $action!="addproduct" && $action!="product"){
  }else {
    include "action/_".$action."_.php";   
  }
}
?>
</div>
<br><br><br>


     </div>
<div class="col-sm-2 paddingTop20">
        <nav class="nav-sidebar nav-left">
            <ul class="nav">
                <li class="active"><a href="javascript:;"><span class="glyphicon glyphicon-info"></span> Informacion</a></li>
                <li><a href="index.php?module=configdeck&id=<?php echo $deck->id; ?>&action=about"><span class="glyphicon glyphicon-info"></span> Acerca de ...</a></li>
                <li><a href="index.php?module=configdeck&id=<?php echo $deck->id; ?>&action=logo">Logo</a></li>
                <li><a href="index.php?module=configdeck&id=<?php echo $deck->id; ?>&action=location">Ubicacion</a></li>
                <li><a href="index.php?module=configdeck&id=<?php echo $deck->id; ?>&action=social">Redes</a></li>
                <li class="nav-divider"></li>
                <li><a href="index.php?module=home">Soporte</a></li>
            </ul>
        </nav>
    </div>
</div>
<br><br><br><br>