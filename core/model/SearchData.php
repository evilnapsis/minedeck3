<?php

class SearchData {

	public static function getDecks($q){
		return DeckData::getLike($q);
	}

	public static function getUsers($q){
		return UserData::getLike($q);
	}


}
?>