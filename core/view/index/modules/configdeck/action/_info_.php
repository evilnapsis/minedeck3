<div class='row'>
<div class='col-md-9'>
<br>
<form class="form-horizontal" method="post" action="update.php" role='form'>
  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail" >Titulo de la empresa</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="title" value="<?php echo $deck->title;?>" required="required" placeholder="Aque se dedica la empresa en pocas palabras ? ">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail">Biografia de la Empresa</label>
    <div class="col-lg-10">
        <textarea name='biografy' style='height:100px;' required="required" class='form-control' placeholder='Descripcion de la empresa'><?php echo $deck->biografy;?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail">Habilidades de la Empresa</label>
    <div class="col-lg-10">
        <textarea name='skills' style='height:100px;' required="required" class='form-control' placeholder="Lo que hace la empresa separado por comas (reparacion de tuberias, mantenimiento de equipo de refrigeracion, ...)"><?php echo $deck->skills;?></textarea>
    </div>
  </div>
<!--  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail">Pais</label>
    <div class="col-lg-10">
      <select name='country_id' class='form-control' style='width:100%;' value="">
      <option class='wide' value="1" >Mexico</option>      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail">Estado</label>
    <div class="col-lg-10">
    <select class='form-control' name='state_id'>
      <?php
              $states = State::getAllByCountryId(1);
              print_r($states);
              foreach($states as $state):
              ?>
                    <option value='<?php echo $state->id; ?>'><?php echo $state->name; ?></option>
                  <?php endforeach; ?>
                  </select>
    </div>
  </div>
-->
    <div class="form-group">
    <label class="control-label col-lg-2" for="inputPassword">Direccion de la Empresa</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="address" required="required" value="<?php echo $deck->address;?>" placeholder="Donde se localizar la empresa.">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-lg-2" for="inputPassword">Numero Telefonico de la Empresa</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="phone" value="<?php echo $deck->phone;?>" required="required"  placeholder="A que numero les pueden contactar?">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-lg-2" for="inputPassword">E-mail de la Empresa</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="mail" value="<?php echo $deck->mail;?>"  placeholder="A que e-mail les pueden contactar?">
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-lg-2" for="inputPassword" >Sitio Web de la Empresa</label>
    <div class="col-lg-10">
      <input class='form-control' type="text" name="website" value="<?php echo $deck->website;?>"placeholder="La direccion del sitio web de la empresa.">
      <input class='form-control' type="hidden" name="reference" value="profile">
      <input class='form-control' type="hidden" name="id" value="<?php echo $deck->id; ?>">

    </div>
  </div>

 <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary btn-lg">Actualizar Informacion</button>
    </div>
  </div>
</form>
</div>
</div>