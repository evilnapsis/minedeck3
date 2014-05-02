<?php


class JobData {
	public static $tablename = "job";
	public function JobData(){
		$this->user_id = "";
		$this->title = "";
		$this->description = "";
		$this->skills = "";
		$this->area_id = "";
		$this->jobtype_id = "";
		$this->jobperiod_id = "";
		$this->duration = "";
		$this->is_public = 1;
		$this->is_finished = 0;
		$this->created_at = time();
	}

public function getUser(){
	return UserData::getById($this->user_id);
}

	public function add(){
		$sql = "insert into ".self::$tablename." (title,description,skills,area_id,jobtype_id,jobperiod_id,duration,is_public,is_finished,created_at,user_id) ";
		$sql .= "value (\"$this->title\",\"$this->description\",\"$this->skills\",$this->area_id,$this->jobtype_id,$this->jobperiod_id,$this->duration,$this->is_public,$this->is_finished,$this->created_at,$this->user_id)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto JobData previamente utilizamos el contexto
	public function update(){
		echo $sql = "update ".self::$tablename." set title=\"$this->title\",description=\"$this->description\",skills=\"$this->skills\",area_id=$this->area_id,jobtype_id=$this->jobtype_id,jobperiod_id=$this->jobperiod_id,duration=$this->duration,is_public=$this->is_public,is_finished=$this->is_finished,created_at=$this->created_at where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new JobData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->title = $r['title'];
			$data->description = $r['description'];
			$data->skills = $r['skills'];
			$data->area = AreaData::getById($r['area_id']);
			$data->area_id = $data->area->id;
			$data->jobtype = JobTypeData::getById($r['jobtype_id']);
			$data->jobtype_id = $data->jobtype->id;
			$data->jobperiod = JobPeriodData::getById($r['jobperiod_id']);
			$data->jobperiod_id = $data->jobperiod->id;
			$data->user = UserData::getById($r['user_id']);
			$data->user_id = $data->user->id;
			$data->duration = $r['duration'];
			$data->is_public = $r['is_public'];
			$data->is_finished = $r['is_finished'];
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
		$data = new JobData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->title = $r['title'];
			$data->name = $r['name'];
			$data->description = $r['description'];
			$data->skills = $r['skills'];
			$data->area = AreaData::getById($r['area_id']);
			$data->area_id = $data->area->id;
			$data->jobtype = JobTypeData::getById($r['jobtype_id']);
			$data->jobtype_id = $data->jobtype->id;
			$data->jobperiod = JobPeriodData::getById($r['jobperiod_id']);
			$data->jobperiod_id = $data->jobperiod->id;
			$data->user = UserData::getById($r['user_id']);
			$data->user_id = $data->user->id;
			$data->duration = $r['duration'];
			$data->is_public = $r['is_public'];
			$data->is_finished = $r['is_finished'];
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
		while($r = $query->fetch_array()){
			$array[$cnt] = new JobData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->skills = $r['skills'];
			$array[$cnt]->area = AreaData::getById($r['area_id']);
			$array[$cnt]->area_id = $array[$cnt]->area->id;
			$array[$cnt]->jobtype = JobTypeData::getById($r['jobtype_id']);
			$array[$cnt]->jobtype_id = $array[$cnt]->jobtype->id;
			$array[$cnt]->jobperiod = JobPeriodData::getById($r['jobperiod_id']);
			$array[$cnt]->jobperiod_id = $array[$cnt]->jobperiod->id;
			$array[$cnt]->user = UserData::getById($r['user_id']);
			$array[$cnt]->user_id = $array[$cnt]->user->id;
			$array[$cnt]->duration = $r['duration'];
			$array[$cnt]->is_public = $r['is_public'];
			$array[$cnt]->is_finished = $r['is_finished'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function getAllByUID($uid){
		$sql = "select * from ".self::$tablename." where user_id=$uid";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query->fetch_array()){
			$array[$cnt] = new JobData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->skills = $r['skills'];
			$array[$cnt]->area = AreaData::getById($r['area_id']);
			$array[$cnt]->area_id = $array[$cnt]->area->id;
			$array[$cnt]->jobtype = JobTypeData::getById($r['jobtype_id']);
			$array[$cnt]->jobtype_id = $array[$cnt]->jobtype->id;
			$array[$cnt]->jobperiod = JobPeriodData::getById($r['jobperiod_id']);
			$array[$cnt]->jobperiod_id = $array[$cnt]->jobperiod->id;
			$array[$cnt]->user = UserData::getById($r['user_id']);
			$array[$cnt]->user_id = $array[$cnt]->user->id;
			$array[$cnt]->is_public = $r['is_public'];
			$array[$cnt]->is_finished = $r['is_finished'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}




}

?>