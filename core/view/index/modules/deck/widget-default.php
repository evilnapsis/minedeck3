<?php
$deck = DeckData::getById($_GET['id']);
?>
<?php 
Viewer::addView($deck->id,"deck_id","deckview");
?>
<div class='row'>
	<div class='col-md-9'>

		<?php
if(!isset($_GET['action'])){
  include "action/_index_.php";
}else {
  $action = $_GET['action'];
    if($action!="index" && $action!="questions" ){
  }else {
    include "action/_".$action."_.php";   
  }
}
?>

	</div>
</div>

<script>
	var follow = document.getElementById("follow");

	follow.onclick = function(){
		console.log("wtf!");
		var xhr = new XMLHttpRequest();
		xhr.open("GET","process.php?action=follow&deck=<?php echo $deck->id; ?>",false);
		xhr.send();
		// console.log(xhr.responseText);
		console.log(xhr.responseText);
		if(xhr.responseText=="200"){
			follow.innerHTML = "<i class='glyphicon glyphicon-ok-sign'></i> Siguiendo";
		}
	}
</script>
<br><br><br><br>
<br><br><br><br>