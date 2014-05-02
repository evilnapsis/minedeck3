     <div style='font-size:30px;'>
    <a href='index.php?module=deck&id=<?php echo $deck->id; ?>' target="_blank" class='btn btn-default pull-right'><i class='glyphicon glyphicon-eye-open'></i> Vista Previa</a>
     <?php echo $deck->title; ?> <small style="color:#888;font-size:20px;"> Seguidores</small></div>
     <p class='alert alert-info'><i class='glyphicon glyphicon-cog'></i> Estas en modo administrador, si respondes o publicas algo sera en nombre de <b><?php echo $deck->title; ?></b></p>

<?php
$followers = DeckFollowerData::getAllByDeckId($deck->id);

if(count($followers)>0):
print "<p class='alert alert-success'><i class='glyphicon glyphicon-ok'></i>&nbsp; Tienes ".count($followers)." seguidores</p>";
?>
<?php foreach($followers as $follower):?>
<?php print "<h3><i class='glyphicon glyphicon-ok'></i>&nbsp;&nbsp;".$follower->getFollower()->name." ".$follower->getFollower()->lastname."</h3>"; ?>
<hr />
<?php endforeach; ?>


<?php else:?>
  <div class='jumbotron'>
    <h2>No hay seguidores</h2>
  </div>
<?php endif; ?>
<br><br><br>