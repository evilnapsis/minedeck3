     <div style='font-size:30px;'>
    <a href='index.php?module=deck&id=<?php echo $deck->id; ?>' target="_blank" class='btn btn-default pull-right'><i class='glyphicon glyphicon-eye-open'></i> Vista Previa</a>
     <?php echo $deck->title; ?> <small style="color:#888;font-size:20px;"> Preguntas</small></div>
     <p class='alert alert-info'><i class='glyphicon glyphicon-cog'></i> Estas en modo administrador, si respondes o publicas algo sera en nombre de <b><?php echo $deck->title; ?></b></p>

<?php
$conversations = ConversationData::getAllByDeckId($deck->id);

if(count($conversations)>0){
	foreach($conversations as $conversation){
		$theuser = $conversation->getUser();
		print "<div class='conversation'>";
		print "<a href='' class='btn btn-default pull-right'><i class='glyphicon glyphicon-comment'></i> Ver Conversacion</a>";
		print "<h3>".$theuser->name." ".$theuser->lastname."</h3>";
  $questions = Question::getAllByConversationId($conversation->id);
  foreach ($questions as $question) {
    print "<p>$question->content</p>";
    print "<br><span class='help-block pull-right'>$question->created_at</span>";
    print "<a href='' class='btn btn-success'>Responder</a>";
    print "<div class='clearfix'></div>";
    print "<hr/>";
  }
  print "</div>";
}
}else{

	/// no hay preguntas
}
?>