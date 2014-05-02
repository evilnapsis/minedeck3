<div class='row'>
<div class='col-md-9'>
<br>
<form class="form-horizontal" method="post" action="update.php" role='form'>
  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Link de Facebook</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="fburl" value="<?php echo $deck->fburl;?>"  placeholder="Escriba el link de facebook">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Link de Twitter</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="twurl" value="<?php echo $deck->twurl;?>"  placeholder="Escriba el link de twitter">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Link de Google+</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="gpurl" value="<?php echo $deck->gpurl;?>"  placeholder="Escriba el link de google+">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Link de Tumblr</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="tumblr" value="<?php echo $deck->tumblr;?>"  placeholder="Escriba el link de tumblr">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Link de Youtube</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="youtube" value="<?php echo $deck->youtube;?>"  placeholder="Escriba el link de youtube">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Link de Blogger</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="blogger" value="<?php echo $deck->blogger;?>"  placeholder="Escriba el link de blogger">
    </div>
  </div>



 <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary btn-lg">Actualizar Informacion</button>
      <input class='form-control' type="hidden" name="reference" value="social">
      <input class='form-control' type="hidden" name="id" value="<?php echo $deck->id; ?>">
    </div>
  </div>
</form>
</div>
</div>