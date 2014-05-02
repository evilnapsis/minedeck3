<h1><?php echo $deck->title; ?> <small>Preguntas y Respuestas</small></h1>
		<p><?php echo $deck->biografy; ?></p>

<?php if(Session::getUID()!=""):?>
<form class="form-horizontal" method="post" action="add.php" role='form'>
  <div class="form-group">
    <label class="control-label col-lg-2" for="inputEmail">Pregunta</label>
    <div class="col-lg-10">
        <textarea name='content' style='height:100px;' required="required" class='form-control' placeholder='Escribe tu pregunta ...'><?php echo $deck->about;?></textarea>
    </div>
  </div>

 <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input class='form-control' type="hidden" name="reference" value="newquestion">
      <input class='form-control' type="hidden" name="id" value="<?php echo $deck->id; ?>">
      <button type="submit" class="btn btn-primary btn-lg">Realizar pregunta</button>
    </div>
  </div>
</form>
<?php else:?>
  <p class="alert alert-warning">No has iniciado sesion. No puedes hacer una pregunta. <a href="index.php?module=signin">Iniciar Sesion</a></p>
<?php endif; ?>

<?php
$conversations = ConversationData::getAllByDeckId($deck->id);

foreach($conversations as $conversation){
  $questions = Question::getAllByConversationId($conversation->id);

  foreach ($questions as $question) {
    print "<h4>$question->content</h4>";
    print "<span class='help-block pull-right'>$question->created_at</span>";
    print "<div class='clearfix'></div>";
    print "<hr/>";
  }
}

?>
