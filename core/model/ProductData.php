<?php


class ProductData {
	public static $tablename = "product";
	public function ProductData(){
		$this->id = "";
		$this->deck_id = "";
		$this->name = "";
		$this->description = "";
		$this->image = "";
		$this->tags = "";
		$this->area_id = "";
		$this->price = "";
		$this->created_at = time();
		$this->is_public = 1;
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (deck_id,name,image,description,tags,area_id,created_at,is_public,price) ";
		$sql .= "value (".$this->deck_id.",\"$this->name\",\"$this->image\",\"$this->description\",\"$this->tags\",".$this->area_id.",$this->created_at,$this->is_public,\"$this->price\")";
        echo $sql;
		return Executor::doit($sql);
	}

	public static function countByDeckId($did){
		$sql = "select count(*) from ".self::$tablename." where deck_id=$did";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		$r = $query[0]->fetch_array();
		return $r[0];
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function update(){
	//	print_r($this->country);
		$sql = "update ".self::$tablename." set name=\"$this->name\",description=\"$this->description\",tags=\"$this->tags\",area_id=".$this->area_id.",image=\"$this->image\",created_at=$this->created_at,is_public=$this->is_public,price=$this->price where id=".$this->id;
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ProductData();
		while($r = $query[0]->fetch_array()){
			$data->deck_id = $r['deck_id'];
			$data->area_id = $r['area_id'];
			$data->name = $r['name'];
			$data->image = $r['image'];
			$data->tags = $r['tags'];
			$data->description = $r['description'];
			$data->is_public = $r['is_public'];
			$data->price = $r['price'];
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
			$array[$cnt] = new ProductData();
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->area_id = $r['area_id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->image = $r['image'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->is_public = $r['is_public'];
			$array[$cnt]->price = $r['price'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_public = $r['is_public'];
			$cnt++;
		}
		return $array;
	}
	public static function getAllByAreaId($area_id){
		$sql = "select * from ".self::$tablename." where area_id=$area_id";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProductData();
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->area_id = $r['area_id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->image = $r['image'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->is_public = $r['is_public'];
			$array[$cnt]->price = $r['price'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_public = $r['is_public'];
			$cnt++;
		}
		return $array;
	}

	public static function getAllRecent($limit){
		$sql = "select * from ".self::$tablename." order by created_at limit $limit";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProductData();
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->area_id = $r['area_id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->image = $r['image'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->is_public = $r['is_public'];
			$array[$cnt]->price = $r['price'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_public = $r['is_public'];
			$cnt++;
		}
		return $array;
	}



	public static function getAllByDeckId($deck_d){
		$sql = "select * from ".self::$tablename." where deck_id=$deck_d";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProductData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->area_id = $r['area_id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->image = $r['image'];
			$array[$cnt]->tags = $r['tags'];
			$array[$cnt]->description = $r['description'];
			$array[$cnt]->is_public = $r['is_public'];
			$array[$cnt]->price = $r['price'];
			$array[$cnt]->created_at = $r['created_at'];
			$array[$cnt]->is_public = $r['is_public'];
			$cnt++;
		}
		return $array;
	}

}

?>