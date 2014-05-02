<div class='row'>
<div class='col-md-9'>
<br>
<form class="form-horizontal" method="post" action="update.php" role='form'>


  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail">Acerca de la Empresa</label>
    <div class="col-lg-10">
        <textarea name='about' style='height:100px;' required="required" class='form-control' placeholder='Acerca de la empresa'><?php echo $deck->about;?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail">Mision de la Empresa</label>
    <div class="col-lg-10">
        <textarea name='about' style='height:100px;' required="required" class='form-control' placeholder='Mision de la empresa'><?php echo $deck->mision;?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail">Vision de la Empresa</label>
    <div class="col-lg-10">
        <textarea name='skills' style='height:100px;' required="required" class='form-control' placeholder="Vision de la empresa"><?php echo $deck->vision;?></textarea>
    </div>
  </div>
 <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input class='form-control' type="hidden" name="reference" value="about">
      <input class='form-control' type="hidden" name="id" value="<?php echo $deck->id; ?>">
      <button type="submit" class="btn btn-primary btn-lg">Actualizar Informacion</button>
    </div>
  </div>
</form>
</div>
</div>