<?php

class ActivityData {
	public static $tablename = "activity";

	public function ActivityData(){
		$this->id = "";
		$this->activity_type_id = "";
		$this->contact_id = "NULL";
		$this->deck_id = "NULL";
		$this->user_id = Session::getUID();
		$this->created_at = time();
	}

	public function add(){
		echo $sql = "insert into ".self::$tablename." (activity_type_id,contact_id,deck_id,user_id,created_at) value (\"$this->activity_type_id\",$this->contact_id,$this->deck_id,$this->user_id,$this->created_at)";
		Executor::doit($sql);
	}

	public function getUser(){
		return UserData::getById($this->user_id);
	}
	public function getContact(){
		return UserData::getById($this->contact_id);
	}
	public function getDeck(){
		return DeckData::getById($this->deck_id);
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public static function countByUID($deck_id){
		$cnt = 0;
		$decks = DeckData::getAllByUID(Session::getUID());
		if(count($decks)>0){
		    foreach($decks as $deck){
				$notifications = ActivityData::countByDeckId($deck->id);
				$cnt += $notifications->count;
			}
		}
		return $cnt;
	}

		public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ActivityData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->activity_type_id = $r['activity_type_id'];
			$data->user_id = $r['user_id'];
			$data->contact_id = $r['contact_id'];
			$data->deck_id = $r['deck_id'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ActivityData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->activity_type_id = $r['activity_type_id'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->contact_id = $r['contact_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


	public static function getAllByUID($uid){
		$sql = "select * from ".self::$tablename." where user_id=$uid order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ActivityData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->activity_type_id = $r['activity_type_id'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->contact_id = $r['contact_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

}
?>