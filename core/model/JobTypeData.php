<?php

class JobTypeData {
	public static $tablename = "jobtype";

	public function JobTypeData(){
		$this->id = "";
		$this->name = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name) value (\"$this->name\")";
		Executor::doit($sql);
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new JobTypeData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new JobTypeData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
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
		while($r = $query->fetch_array()){
			$array[$cnt] = new JobTypeData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$cnt++;
		}
		return $array;
	}

}
?>