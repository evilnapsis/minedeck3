<?php

class UserJobData {
	public static $tablename = "user_job";

	public function UserJobData(){
		$this->id = "";
		$this->user_id = Session::getUID();
		$this->job_id = "";
		$this->is_selected = 0;
		$this->created_at = time();
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (user_id,job_id,is_selected,created_at) value ($this->user_id,$this->job_id,$this->is_selected,$this->created_at)";
		Executor::doit($sql);
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
		$sql = "update ".self::$tablename." set user_id=\"$this->user_id\",job_id=\"$this->job_id\",created_at=\"$this->created_at\",is_selected=\"$this->is_selected\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getJobByUID($job_id,$uid){
		$sql = "select * from ".self::$tablename." where job_id=$job_id and user_id=$uid";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserJobData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->user_id = $r['user_id'];
			$data->job_id = $r['job_id'];
			$data->is_selected = $r['is_selected'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}



	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserJobData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->user_id = $r['user_id'];
			$data->job_id = $r['job_id'];
			$data->is_selected = $r['is_selected'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getByJobId($id){
		$sql = "select * from ".self::$tablename." where job_id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserJobData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->user_id = $r['user_id'];
			$data->job_id = $r['job_id'];
			$data->is_selected = $r['is_selected'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserJobData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->user_id = $r['user_id'];
			$data->job_id = $r['job_id'];
			$data->is_selected = $r['is_selected'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getAllByJobId($job_id){
		$sql = "select * from ".self::$tablename." where job_id=$job_id";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new UserJobData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->job_id = $r['job_id'];
			$array[$cnt]->is_selected = $r['is_selected'];
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
			$array[$cnt] = new UserJobData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->job_id = $r['job_id'];
			$arrau[$cnt]->is_selected = $r['is_selected'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

}
?>