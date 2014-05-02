<?php
if($deck->getLogo()!=""){
  print "<center><img src='".$deck->getLogo()."' style='width:60px;' class='img-responsive pull-right'></center>";
}
?>
<div style="font-size:50px;"><?php echo $deck->title; ?></div>
		<p><?php echo $deck->biografy; ?></p>
<br>
<div class='btn-group pull-right'>
<a class='btn btn-default tip' title='<?php echo DeckViewData::countByProfileId($deck->id); ?> Vistas'><?php echo DeckViewData::countByProfileId($deck->id); ?> <i class='glyphicon glyphicon-eye-open'></i></a>
&nbsp;&nbsp;&nbsp;<a class='btn btn-default tip' title='<?php echo DeckFollowerData::countByDeckId($deck->id); ?> Seguidores'><?php echo DeckFollowerData::countByDeckId($deck->id); ?> <i class='glyphicon glyphicon-ok-sign'></i></a>
</div>
		<div class='btn-group'>
			<button class='btn btn-default'><i class='glyphicon glyphicon-thumbs-up'></i> Recomendar</button>
			<a href='index.php?module=deck&id=<?php echo $deck->id; ?>&action=questions' class='btn btn-default'><i class='glyphicon glyphicon-comment'></i> Preguntar </a>
			<button class='btn btn-default'><i class='glyphicon glyphicon-heart-empty'></i> Favorito</button>

			<?php if(Session::getUID()!="" && DeckFollowerData::isFollower(Session::getUID(),$deck->id)):?>
				<button class='btn btn-default'><i class='glyphicon glyphicon-ok-sign'></i> Siguiendo</button>
			<?php else:?>
				<button class='btn btn-default' id="follow"><i class='glyphicon glyphicon-ok'></i> Seguir</button>
			<?php endif; ?>

		</div>



<div class='clearfix'></div><br>
	<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Informacion</h3>

					</div>
					<table class="table table-hover" id="dev-table">
						<tbody>
							<tr>
								<td><b>Actividades</b></td>
								<td><?php echo $deck->skills;?></td>
							</tr>
							<tr>
								<td><b>Direccion</b></td>
								<td><?php echo $deck->address;?></td>
							</tr>							
							<tr>
								<td><b>Telefono</b></td>
								<td><?php echo $deck->phone; ?></td>
							</tr>
							<?php if($deck->mail!=""):?>
							<tr>
								<td><b>Correo Electronico</b></td>
								<td><?php echo $deck->mail; ?></td>
							</tr>
						<?php endif; ?>
						<?php if($deck->website!=""):?>
							<tr>
								<td><b>Sitio Web</b></td>
								<td><a href='<?php echo $deck->website; ?>'><?php echo $deck->website; ?></a></td>
							</tr>
						<?php endif; ?>
						</tbody>
					</table>
				</div>

<?php if($deck->fburl!=""|| $deck->twurl!=""||$deck->gpurl!=""||$deck->tumblr!=""||$deck->blogger!=""||$deck->youtube!=""):?>
		<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Links Sociales</h3>
					</div>
					<table class="table table-hover" id="dev-table">
						<tbody>
						<?php if($deck->fburl!=""):?>
							<tr>
								<td><b>Facebook</b></td>
								<td><a href='<?php echo $deck->fburl; ?>'><?php echo $deck->fburl; ?></a></td>
							</tr>
						<?php endif; ?>
						<?php if($deck->twurl!=""):?>
							<tr>
								<td><b>Twitter</b></td>
								<td><a href='<?php echo $deck->twurl; ?>'><?php echo $deck->twurl; ?></a></td>
							</tr>
						<?php endif; ?>

						<?php if($deck->gpurl!=""):?>
							<tr>
								<td><b>Google+</b></td>
								<td><a href='<?php echo $deck->gpurl; ?>'><?php echo $deck->gpurl; ?></a></td>
							</tr>
						<?php endif; ?>
						<?php if($deck->tumblr!=""):?>
							<tr>
								<td><b>Tumblr</b></td>
								<td><a href='<?php echo $deck->tumblr; ?>'><?php echo $deck->tumblr; ?></a></td>
							</tr>
						<?php endif; ?>

						<?php if($deck->youtube!=""):?>
							<tr>
								<td><b>Youtube</b></td>
								<td><a href='<?php echo $deck->youtube; ?>'><?php echo $deck->youtube; ?></a></td>
							</tr>
						<?php endif; ?>
						<?php if($deck->blogger!=""):?>
							<tr>
								<td><b>Blogger</b></td>
								<td><a href='<?php echo $deck->blogger; ?>'><?php echo $deck->blogger; ?></a></td>
							</tr>
						<?php endif; ?>
						</tbody>
					</table>
				</div>
<?php endif; ?>

<?php if($deck->latitud!="" && $deck->longitud!=""):?>
		<br><br>
		<div id="map-canvas"></div>
<?php endif;?>
