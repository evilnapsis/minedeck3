<?php

class NotificationData {
	public static $tablename = "notification";

	public function NotificationData(){
		$this->id = "";
		$this->title = "";
		$this->content = "";
		$this->notification_type_id = "";
		$this->deck_id = "";
		$this->is_readed = 0;
		$this->created_at = time();
	}

	public function add(){
		echo $sql = "insert into ".self::$tablename." (title,content,notification_type_id,deck_id,is_readed,created_at) value (\"$this->title\",\"$this->content\",$this->notification_type_id,$this->deck_id, $this->is_readed,$this->created_at)";
		Executor::doit($sql);
	}

	public function getUser(){
		return UserData::getById($this->id);
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
				$notifications = NotificationData::countByDeckId($deck->id);
				$cnt += $notifications->count;
			}
		}
		return $cnt;
	}


	public static function countByDeckId($deck_id){
		$sql = "select count(*) as count from ".self::$tablename." where deck_id=$deck_id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new NotificationData();
		while($r = $query[0]->fetch_array()){
			$data->count = $r['count'];
			$found = $data;
			break;
		}
		return $found;
	}

		public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new NotificationData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->content = $r['content'];
			$data->title = $r['title'];
			$data->notification_type_id = $r['notification_type_id'];
			$data->deck_id = $r['deck_id'];
			$data->is_readed = $r['is_readed'];
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
			$array[$cnt] = new NotificationData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->notification_type_id = $r['notification_type_id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->is_readed = $r['is_readed'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


	public static function getAllByDeckId($deckid){
		$sql = "select * from ".self::$tablename." where deck_id=$deckid order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new NotificationData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->notification_type_id = $r['notification_type_id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->is_readed = $r['is_readed'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

}
?>