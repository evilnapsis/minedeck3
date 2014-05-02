<?php

class ConversationData {
	public static $tablename = "conversation";

	public function ConversationData(){
		$this->id = "";
		$this->user_id = Session::getUID();
		$this->deck_id = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (user_id,deck_id,created_at) value ($this->user_id,$this->deck_id,$this->created_at)";
		return Executor::doit($sql);
	}
	public function getUser(){
		return UserData::getById($this->user_id);
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set user_id=\"$this->user_id\",deck_id=\"$this->deck_id\",created_at=\"$this->created_at\" where id=$this->id";
		Executor::doit($sql);
	}




	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ConversationData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->user_id = $r['user_id'];
			$data->deck_id = $r['deck_id'];
			$data->is_selected = $r['is_selected'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAllByDeckId($deck_id){
		$sql = "select * from ".self::$tablename." where deck_id=$deck_id order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ConversationData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new ConversationData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

}
?>