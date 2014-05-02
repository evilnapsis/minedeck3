<div class='col-md-9'>
<?php
if($deck->image==""){
?>
<h3 class='roboto'>Agregar Imagen de Perfil</h3>
<div class='river-bg pd20'>
	<p class='alert alert-success'>Selecciona el logo para mostrar de tu negocio y haz click en el boton "Agregar Logo".</p>
<form enctype="multipart/form-data" method='post' action='add.php'  id='addprod'>
	<input type='hidden' name='reference' value='addlogo'>
	<input type='hidden' name='deck_id' value='<?php echo $_GET['id'];?>'>
	<input class="wide file input" id="image" type="file" required name='image' placeholder="Distintiva" />
	<input type='submit' value='Agregar Logo' class='btn btn-lg btn-primary pull-right'>
</form>
</div>
<?php
}
else{
?>
<h3 class='roboto'>Cambiar Imagen de Perfil</h3>
<div class='profile-image'>
<?php
$url=$deck->getLogo();
print "<center><img src='$url'></center>";
?>
<br><center><a href="add.php?reference=deletelogo&deck=<?php echo $deck->id; ?>" class="btn btn-danger btn-lg" >Eliminar Logo</a></center>
</div><br><br><br>
<?php

}
?>


</div>
