<div class='col-md-9'>
<?php
if($user->image==""){
?>
<h3 class='roboto'>Agregar Imagen de Perfil</h3>
<div class='river-bg pd20'>
	<p class='alert alert-success'>Selecciona una imagen para mostrar en tu perfil.</p>
<form enctype="multipart/form-data" method='post' action='add.php'  id='addprod'>
	<input type='hidden' name='reference' value='addimage'>
	<input type='hidden' name='deck_id' value='<?php echo $_GET['id'];?>'>
	<input class="wide file input" id="image" type="file" required name='image' placeholder="Distintiva" />
	<input type='submit' value='Agregar Imagen' class='btn btn-lg btn-primary pull-right'>
</form>
</div>
<?php
}
else{
?>
<h3 class='roboto'>Cambiar Imagen de Perfil</h3>
<div class='profile-image'>
<?php
$url="storage/".Session::getUID()."/image/".$user->image;
print "<center><img src='$url'></center>";
?>
<br><center><a href="add.php?reference=deleteimage&deck=<?php echo $user->id; ?>" class="btn btn-danger btn-lg" >Eliminar Imagen</a></center>
<br><p class="alert alert-warning">Solo tus amigos pueden ver tu imagen de perfil.</p>
</div><br><br><br>
<?php

}
?>


</div>
