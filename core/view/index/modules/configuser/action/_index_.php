<div class='row'>
<div class='col-md-9'>
<h2>Editar Informacion del Usuario</h2>
<br>
<form class="form-horizontal" method="post" action="update.php" role='form'>
  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Nombre</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="title" value="<?php echo $user->name;?>" required="required" placeholder="Aque se dedica la empresa en pocas palabras ? ">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Apellidos</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="title" value="<?php echo $user->lastname;?>" required="required" placeholder="Aque se dedica la empresa en pocas palabras ? ">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Correo electronico</label>
    <div class="col-lg-10">
      <input class='form-control' readonly="" type="text" name="title" value="<?php echo $user->mail;?>" required="required" placeholder="Aque se dedica la empresa en pocas palabras ? ">
    </div>
  </div>

 <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input class='form-control' type="hidden" name="reference" value="updateuserinfo">
      <button type="submit" class="btn btn-primary btn-lg">Actualizar Informacion</button>
    </div>
  </div>
</form>
</div>
</div>