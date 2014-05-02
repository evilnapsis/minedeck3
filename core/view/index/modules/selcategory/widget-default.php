<div class="row">
<div class="col-md-12">
<h2>Categorias y Subcategorias</h2>
<p class='alert alert-info'>Selecciona la categoria y subcategoria en la que agregaras tu negocio.</p>
</div>
</div>

<div class="row">
        	<?php
        	$categories = CategoryData::getAll();
        	?>
                	<?php foreach($categories as $category): ?>
        <div class="col-md-3 col-sm-4 col-xs-6">
        	<p></p>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $category->name; ?></h3>
                </div>
                <div class='panel-body'>
                <form method='get' action='index.php'>
                	<p>Seleccione subcategoria:</p>
                	<input type='hidden' value='newdeck' name='module'>
                	<select class="form-control" name='scatid' required="required">
                        <option value=''>-- SELECCIONA --</option>
                	<?php
        			$subcategories = SubcategoryData::getAllByCategoryId($category->id);
        			foreach($subcategories as $subcategory):
        			?>
                		<option value='<?php echo $subcategory->id; ?>'><?php echo $subcategory->name; ?></option>
                	<?php endforeach; ?>
                	</select>
                	<br><input type='submit' value='Seleccionar' class='btn btn-info btn-block'>
                </form>
                </div>
            </div>
        </div>                	<?php endforeach; ?>

        <div class="col-md-2">
        </div>

    </div>
 <br><br><br><br>