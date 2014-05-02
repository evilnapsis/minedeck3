<?php

class Question {
	public static $tablename = "question";

	public function Question(){
		$this->id = "";
		$this->content = "";
		$this->conversation_id = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		echo $sql = "insert into ".self::$tablename." (content,conversation_id,created_at) value (\"$this->content\",$this->conversation_id,$this->created_at)";
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
				$notifications = Question::countByDeckId($deck->id);
				$cnt += $notifications->count;
			}
		}
		return $cnt;
	}


	public static function countByDeckId($deck_id){
		$sql = "select count(*) as count from ".self::$tablename." where deck_id=$deck_id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new Question();
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
		$data = new Question();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->content = $r['content'];
			$data->title = $r['title'];
			$data->user_id = $r['user_id'];
			$data->deck_id = $r['deck_id'];
			$data->is_public = $r['is_public'];
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
			$array[$cnt] = new Question();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->is_public = $r['is_public'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function getAllByConversationId($conversation_id){
		$sql = "select * from ".self::$tablename." where conversation_id=$conversation_id order by created_at";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new Question();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->conversation_id = $r['conversation_id'];
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
			$array[$cnt] = new Question();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->content = $r['content'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->is_public = $r['is_public'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

}
?>