<div class='row'>
<div class='col-md-9'>
<h2>Editar Contraseña</h2>
<br>
<form class="form-horizontal" method="post" id="updatepassword" action="update.php" role='form'>
  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Contraseña Actual</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="password" id="password"  placeholder="Escribe tu Contraseña actual ">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Nueva Contraseña</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="newpassword" id="newpassword"   placeholder="Escribe tu nueva contraseña ">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Confirmar Contraseña</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="confirmpassword" id="confirmpassword"   placeholder="Confirma tu nueva contraseña ">
    </div>
  </div>

 <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input class='form-control' type="hidden" name="reference" value="updatepassword">
      <button type="submit" class="btn btn-primary btn-lg">Actualizar Contraseña</button>
    </div>
  </div>
</form>
</div>
</div>
<script>


$("#updatepassword").submit(function(e){
  if($("#password").val()=="" || $("#newpassword").val()=="" || $("#confirmpassword").val()==""  ){
    e.preventDefault();
    alert("No debes dejar compos vacios");

  }else{
  if($("#newpassword").val()==$("#confirmpassword").val() ){

  }else{

    e.preventDefault();
    alert("Las contraseñas no coinciden");

  }
  }

})

</script>