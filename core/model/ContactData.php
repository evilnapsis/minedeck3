<?php

class ContactData {
	public static $tablename = "contact";

	public function ContactData(){
		$this->id = "";
		$this->title = "";
		$this->description = "";
		$this->contact_id = "";
		$this->user_id = "";
		$this->created_at = time();
	}

	public function add(){
		echo $sql = "insert into ".self::$tablename." (title,description,contact_id,user_id,created_at) value (\"$this->title\",\"$this->description\",$this->contact_id,$this->user_id,$this->created_at)";
		Executor::doit($sql);
	}

	public function getUser(){
		return UserData::getById($this->id);
	}
	public function getContact(){
		return UserData::getById($this->contact_id);
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
				$notifications = ContactData::countByDeckId($deck->id);
				$cnt += $notifications->count;
			}
		}
		return $cnt;
	}

		public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ContactData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->description = $r['description'];
			$data->title = $r['title'];
			$data->user_id = $r['user_id'];
			$data->contact_id = $r['contact_id'];
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
			$array[$cnt] = new ContactData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->contact_id = $r['contact_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function isContact($contact_id){
		$sql = "select * from ".self::$tablename." where contact_id=$contact_id and user_id=".Session::getUID();
		$query = Executor::doit($sql);
		$found = false;
		while($r = $query[0]->fetch_array()){
			$found = true;
		}
		return $found;
	}


	public static function getAllByUID($uid){
		$sql = "select * from ".self::$tablename." where user_id=$uid order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ContactData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->contact_id = $r['contact_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

}
?>