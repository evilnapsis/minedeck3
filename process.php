<?php

session_start();
include "core/bootstrap.inc";

 if(Session::getUID()!=""){
	if($_GET['action']=="follow" && $_GET['deck']!=""){
		if(!DeckFollowerData::isFollower(Session::getUID(), $_GET['deck'])){
			$f = new DeckFollowerData();
			$f->deck_id = $_GET['deck'];
			$f->follower_id = Session::getUID();
			$f->add();
			print "200";
		}
	}
 }



?>