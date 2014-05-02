<?php
include "core/bootstrap.inc";

if(isset($_POST['reference'])){
	session_start();
	$reference = $_POST['reference'];
	if(Session::getUID()!=""){
		print "Cargando ...";
		// acciones para usuarios logeados
		if($reference=="profile"){
			$ud = UserData::getById(Session::getUID());
			$p = new DeckData();
			$p->user = $ud;
			$p->title = $_POST['title'];
			$p->biografy = $_POST['biografy'];
			$p->skills = $_POST['skills'];
			$p->subcategory_id = $_POST['subcategory_id'];
			$p->address = $_POST['address'];
			$p->state_id = $_POST['state_id'];
			$p->phone = $_POST['phone'];
			$p->website = $_POST['website'];
			$rx= $p->add();


			print "<script>window.location='index.php?module=admindeck&id=".$rx[1]."';</script>";
		}
//////////////////////////////////////////////////////////
		else if($reference=="newquestion"){
			print "nueva pregunta !!";

			$conversation = new ConversationData();

			$conversation->user_id = Session::getUID();
			$conversation->deck_id = $_POST["id"];
			$conv_id = $conversation->add();

			$question = new Question();
			$question->content = $_POST['content'];
			$question->conversation_id = $conv_id[1];
			$question->add();

			setcookie("questionadded","true");

				print "<script>window.location='index.php?module=deck&id=$_POST[id]&action=questions';</script>";
		}
/////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////
		else if($reference=="addfollower"){
			$df = new DeckFollowerData();
			$df->follower_id = Session::getUID();
			$df->deck_id = $_POST['id'];
			$notif = new NotificationData();
			$notif->title = "Agregado a Favoritos";
			$notif->content = "<b>".UserData::getById($df->follower_id)->name."</b> ha agregado a <a href='view.php?module=deck&id=".$df->deck_id."'>".DeckData::getById($df->deck_id)->title."</a> a sus favoritos";
			$notif->deck_id = $df->deck_id;
			$notif->notification_type_id = 1;
			$notif->isreaded = 0;
			$notif->created_at = time();
			$notif->add();

			$act = new ActivityData();
			$act->activity_type_id = 2;
			$act->deck_id = $df->deck_id;
			$act->add();

			if($df->add()){
				print "<script>window.location='view.php?module=deck&id=$_POST[id]';</script>";
			}else {
				print "<script>window.location='view.php?module=deck&id=$_POST[id]';</script>";
			}		

		}
/////////////////////////////////////////////////////////////

		else if($reference=="addjob"){
			$job = new JobData();
			$job->title = $_POST['title'];
			$job->description = $_POST['description'];
			$job->skills = $_POST['skills'];
			$job->user_id = Session::getUID();
			$job->area_id = $_POST['area_id'];
			$job->jobtype_id = $_POST['jobtype_id'];
			$job->jobperiod_id = $_POST['jobperiod_id'];
			$job->duration = $_POST['duration'];
			if($job->add()){
				print "<script>window.location='home.php?module=jobs';</script>";
			}else {
				print "<script>window.location='home.php?module=jobs&error=add';</script>";
			}		
		}
/////////////////////////////////////////////////////////////

		else if($reference=="addproduct"){
$p = new ProductData();
$p->name = $_POST['name'];
$p->description = $_POST['description'];
$p->price = $_POST['price'];
$p->area_id = $_POST['area_id'];
$p->deck_id = $_POST['deck_id'];
$q=$p->add();
			if($q!=null){
				print "<script>window.location='home.php?module=deck&id=$_POST[deck_id]&action=product&pid=$q[1]';</script>";
			}else {
				print "<script>window.location='home.php?module=deck&id=$_POST[deck_id]&action=product&pid=$q[1]&error=add';</script>";
			}		
		}
/////////////////////////////////////////////////////////////
		else if($reference=="sendmessage"){
			$user=null;
			if(isset($_POST['user'])){
				$mail = $_POST['user'];
				$user = UserData::getByMail($mail);
			}else if(isset($_POST['receiver_id'])){
				$user = UserData::getById($_POST['receiver_id']);				
			}
			if($user!=null){
			$title = $_POST['title'];
			$content = $_POST['content'];
			
			$md = new MessageData();
			$md->receiver_id = $user->id;
			$md->title = $title;
			$md->content = $content;

			$notification = new NotificationData();
			$notification->user_id = $user->id ;
			$notification->prospect_id = Session::getUID() ;
			$notification->content = "<a href='view.php?module=profile&id=".Session::getUID()."'>".UserData::getById(Session::getUID())->name."</a> te ha enviado un mensage.</a>";
			$notification->add();

			if(isset($_POST['receiver_id'])){				
				print "<script>window.location='home.php?module=message&sendby=".$_POST['receiver_id']."&action=read';</script>";
			}

			setcookie("sendsuccess","good");
			if($md->add()){
				print "<script>window.location='home.php?module=message&action=new';</script>";
			}else {
				print "<script>window.location='home.php?module=message&action=new&error=add';</script>";
			}
		}else{
			setcookie("badmail","bad");
			print "<script>window.location='home.php?module=message&action=new';</script>";			
		}
	}

		else if ($reference=="addlogo"){

		$handle = new Upload($_FILES['image']);
		$imfound = false;
    	if ($handle->uploaded) {
    		$url="storage/".Session::getUID()."/deck/".$_POST["deck_id"]."/logo";
        	print_r($handle->Process($url));
        	$handle->Process($url);
        	$ud = DeckData::getById($_POST['deck_id']);
        	$ud->image = $handle->file_dst_name;
			if($ud->update()){
				print "<script>window.location='index.php?module=configdeck&id=$_POST[deck_id]&action=logo';</script>";
			}else {
				print "<script>window.location='index.php?module=configdeck&id=$_POST[deck_id]&action=logo';</script>";
			}
		}
	}
///////////////
		else if ($reference=="addimage"){

		$handle = new Upload($_FILES['image']);
		$imfound = false;
    	if ($handle->uploaded) {
    		$url="storage/".Session::getUID()."/image/";
        	print_r($handle->Process($url));
        	$handle->Process($url);
        	$ud = UserData::getById(Session::getUID());
        	$ud->image = $handle->file_dst_name;
			if($ud->update()){
				print "<script>window.location='index.php?module=configuser&action=image';</script>";
			}else {
				print "<script>window.location='index.php?module=configuser&action=image&error=add';</script>";
			}
		}
	}
///////////////
		else if ($reference=="addcurriculum"){

		$handle = new Upload($_FILES['curriculum']);
		$imfound = false;
    	if ($handle->uploaded) {
    		$url="res/storage/".Session::getUID()."/curriculum/";
        	print_r($handle->Process($url));
        	$handle->Process($url);
        	$ud = ProfileData::getByUID(Session::getUID());
        	$ud->curriculum = $handle->file_dst_name;
			if($ud->update()){
				print "<script>window.location='home.php?module=configuration&action=curriculum';</script>";
			}else {
				print "<script>window.location='home.php?module=configuration&action=curriculum&error=add';</script>";
			}
		}
	}

///////////////
		}else {
		if($reference=="register"){
			if(count(UserData::getAllByEmail($_POST['email']))==0){
			$p = new UserData();
			$p->name = $_POST['name'];
			$p->lastname = $_POST['lastname'];
			$p->mail = $_POST['email'];
			$p->password = sha1(md5($_POST['password']));
			$p->add();
			setcookie('maillogged',$p->mail);
			print "<script>window.location='index.php?module=wellcome';</script>";
			}else{
			setcookie('mailexist',1);
			print "<script>window.location='index.php?module=register';</script>";

			}
		}
		// acciones para usuarios no logeados
	}
}
else if(isset($_GET['reference'])){
	session_start();
	if(Session::getUID()!=""){
		$reference = $_GET['reference'];
		if($reference=="addcontact"){
			$c = new ContactData();
			$c->contact_id = $_GET['contact_id'];
			$c->user_id = Session::getUID();
			$t = $c->add();
			$act = new ActivityData();
			$act->activity_type_id = 1;
			$act->contact_id = $_GET['contact_id'];
			$act->add();
		}
	else if ($reference=="deletelogo"){
        	$ud = DeckData::getById($_GET['deck']);
    		$url="storage/".Session::getUID()."/deck/".$_GET["deck"]."/logo/".$ud->image;
    		unlink($url);
    		$ud->image = "";
        	$ud->update();
				print "<script>window.location='index.php?module=configdeck&id=$_GET[deck]&action=logo';</script>";
	}
///////////////
	else if ($reference=="deleteimage"){
        	$ud = UserData::getById(Session::getUID());
    		$url="storage/".Session::getUID()."/image/".$ud->image;
    		unlink($url);
    		$ud->image = "";
        	$ud->update();
				print "<script>window.location='index.php?module=configuser&action=image';</script>";
	}
///////////////

	}




}
else {
	echo "no hay referencia";
}

?>
