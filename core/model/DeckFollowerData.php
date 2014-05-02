<?php


class DeckFollowerData {
	public static $tablename = "deck_follower";
	public function DeckFollowerData(){
		$this->follower_id = "";
		$this->deck_id = "";
		$this->created_at = time();
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (follower_id,deck_id,created_at) ";
		 $sql .= "value ($this->follower_id,$this->deck_id,$this->created_at)";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}


	public static function isFollower($user_id,$deck_id){
		$sql = "select * from ".self::$tablename." where follower_id=$user_id and deck_id=$deck_id";
		$query = Executor::doit($sql);
		$found = false;
		$data = new DeckFollowerData();
		while($r = $query[0]->fetch_array()){
			$found = true;
			break;
		}
		return $found;
	}



	public static function isFavorite($user_id,$deck_id){
		echo $sql = "select * from ".self::$tablename." where follower_id=$user_id and deck_id=$deck_id";
		$query = Executor::doit($sql);
		$found = false;
		$data = new DeckFollowerData();
		while($r = $query[0]->fetch_array()){
			$found = true;
			break;
		}
		return $found;


	}
// partiendo de que ya tenemos creado un objecto DeckFollowerData previamente utilizamos el contexto
	public function update(){
	}


	public static function getAllByUID($uid){
		$sql = "select * from ".self::$tablename." where follower_id=$uid order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DeckFollowerData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->follower_id = $r['follower_id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function countByDeckId($did){
		$sql = "select count(*) from ".self::$tablename." where deck_id=$did";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		$r = $query[0]->fetch_array();
		return $r[0];
	}


public function getDeck(){
	return DeckData::getById($this->deck_id);
}

public function getFollower(){
	return UserData::getById($this->follower_id);
}


	public static function getAllByDeckId($deckid){
		$sql = "select * from ".self::$tablename." where deck_id=$deckid order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DeckFollowerData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->follower_id = $r['follower_id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}
}

?>