<?php
include "core/bootstrap.inc";

if(isset($_POST['reference'])){
	session_start();
	if(Session::getUID()!=""){
		// acciones para usuarios logeados
		$reference = $_POST['reference'];
		if($reference=="profile"){
			$ud = UserData::getById(Session::getUID());
			$p = DeckData::getById($_POST['id']);
// print_r($p);
			$p->user = $ud;
			$p->title = $_POST['title'];
			$p->biografy = $_POST['biografy'];
			$p->skills = $_POST['skills'];
			$p->address = $_POST['address'];
			$p->phone = $_POST['phone'];
			$p->website = $_POST['website'];
			$p->mail = $_POST['mail'];
			$p->update();
			setcookie("infoupdated",$p->id);
			print "<script>window.location='index.php?module=configdeck&action=editinfo&id=$p->id';</script>";
		}
///////////////// location ////////////////////////////////////
		else if($reference=="editlocation"){
	//		$ud = UserData::getById(Session::getUID());
			$deck = DeckData::getById($_POST['id']);
			$deck->latitud = $_POST['latitud'];
			$deck->longitud = $_POST['longitud'];
			$deck->update();
			setcookie("locationupdated",$deck->id);
			print "<script>window.location='index.php?module=configdeck&id=".$_POST['id']."&action=location';</script>";
		}
///////////////// social ////////////////////////////////////
		else if($reference=="social"){
	//		$ud = UserData::getById(Session::getUID());
			$deck = DeckData::getById($_POST['id']);
			$deck->website = $_POST['website'];
			$deck->fburl = $_POST['fburl'];
			$deck->twurl = $_POST['twurl'];
			$deck->gpurl = $_POST['gpurl'];

			$deck->tumblr = $_POST['tumblr'];
			$deck->blogger = $_POST['blogger'];
			$deck->youtube = $_POST['youtube'];

			$deck->update();
			print "<script>window.location='index.php?module=configdeck&id=".$_POST['id']."&action=social';</script>";
		}
/////////////////////////////////////////////////////////
		else if ($reference=="updatelogo"){
		$handle = new Upload($_FILES['image']);
		$deck = DeckData::getById($_POST['id']);
		print_r($deck);
		$imfound = false;
    	if ($handle->uploaded) {
    		$url="uploads/".Session::getUID()."/deck/".$deck->id."/logo";
        	print_r($handle->Process($url));
        	$handle->Process($url);
 //       	$ud = UserData::getById(Session::getUID());
 //       	$ud->image = $handle->file_dst_name;
        	$deck->image = $handle->file_dst_name;
       	echo $handle->file_dst_name;
			if($deck->update()){
				 print "<script>window.location='home.php?module=deck&id=".$_POST['id']."&action=logo';</script>";
			}else {
				 print "<script>window.location='home.php?module=deck&id=".$_POST['id']."&action=logo';</script>";
			}
		}
	}
///////////////

/////////////////////////////////////////////////////////
	}else {
		// acciones para usuarios no logeados
	}
}else {
	echo "no hay referencia";
}

?>