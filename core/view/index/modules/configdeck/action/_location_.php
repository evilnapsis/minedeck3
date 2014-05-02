  <div class='col-md-12'>
<?php if(isset($_COOKIE['locationupdated'])):?>
    <p class='alert alert-info'><i class='glyphicon glyphicon-ok-sign'></i> La ubicaci&oacute;n ha sido actualizada exitosamente !!</p>
<?php
setcookie('locationupdated','',time()-18600);
 endif; ?>

    <div id="map-canvas"></div>
    <br>
    <form class="form-inline" method="post" action="update.php">
    <button type="submit" class="btn btn-primary">Actualizar Ubicacion</button>
    <div class="form-group">
      <label class="sr-only" for="exampleInputEmail2">Latitud</label>
        <input type="text" name="latitud" required="required" id="lat" class='form-control' value="<?php if($deck!=null){echo $deck->latitud;}?>" placeholder="Aque se dedica la empresa en pocas palabras ? ">
    </div>
    <div class="form-group">
      <label class="sr-only" for="exampleInputPassword2">Longitud</label>
        <input type="text" required="required" class='form-control' name="longitud" id="long" value="<?php if($deck!=null){echo $deck->longitud;}?>" placeholder="La direccion del sitio web de la empresa.">
        <input type="hidden" name="reference" value="editlocation">
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    </div>

    </form>
</div>

