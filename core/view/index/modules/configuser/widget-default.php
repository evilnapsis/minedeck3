 <div id="blog" class="row"> 
     <div class="col-md-10 blogShort">
<?php
if(!isset($_GET['action'])){
  include "action/_index_.php";
}else {
  $action = $_GET['action'];
    if($action!="index" &&  $action!="image"&&  $action!="password"){
  }else {
    include "action/_".$action."_.php";   
  }
}
?>
    </div>
<div class="col-sm-2 paddingTop20">

        <nav class="nav-sidebar nav-left">
            <ul class="nav">
                <li class="active"><a href="index.php?module=configuser"><span class="glyphicon glyphicon-home"></span> Informacion</a></li>
                <li><a href="index.php?module=configuser&action=image">Imagen</a></li>
                <li><a href="index.php?module=configuser&action=password">Contraseña</a></li>
            </ul>
        </nav>
    </div>
</div>
<br><br><br><br>