<?php


class DeckData {
	public static $tablename = "deck";
	public function DeckData(){
		$this->id = "";
		$this->user_id = "";
		$this->title = "";
		$this->biografy = "";
		$this->image = "";
		$this->skills = "";
		$this->area = "";
		$this->address = "";
		$this->country = "";
		$this->latitud = "";
		$this->longitud = "";
		$this->phone = "";
		$this->mail = "";
		$this->website = "";
		$this->fburl = "";
		$this->twurl = "";
		$this->gpurl = "";
		$this->tumblr = "";
		$this->blogger = "";
		$this->youtube = "";
		$this->about = "";
		$this->mision = "";
		$this->vision = "";
		$this->founded_at = "";
		$this->created_at = time();
		$this->is_public = 1;
		$this->is_verified = 0;
	}

	public function getLogo(){
		$url="";
		if($this->image!=""){
			$url="storage/".$this->user_id."/deck/".$this->id."/logo/".$this->image;
		}
		return $url;
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (user_id,title,image,biografy,skills,mail,subcategory_id,address,state_id,latitud,longitud,phone,website,fburl,twurl,gpurl,tumblr,blogger,created_at,is_public,is_verified) ";
		$sql .= "value (".$this->user->id.",\"$this->title\",\"$this->image\",\"$this->biografy\",\"$this->skills\",\"$this->mail\",\"$this->subcategory_id\",\"$this->address\",\"$this->state_id\",\"$this->latitud\",\"$this->longitud\",\"$this->phone\",\"$this->website\",\"$this->fburl\",\"$this->twurl\",\"$this->gpurl\",\"$this->tumblr\",\"$this->blogger\",$this->created_at,$this->is_public,$this->is_verified)";
        $sql;
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

// partiendo de que ya tenemos creado un objecto DeckData previamente utilizamos el contexto
	public function update(){
	//	print_r($this->country);
		$sql = "update ".self::$tablename." set title=\"$this->title\",biografy=\"$this->biografy\",skills=\"$this->skills\",address=\"$this->address\",mail=\"$this->mail\",latitud=\"$this->latitud\",longitud=\"$this->longitud\",phone=\"$this->phone\",website=\"$this->website\",fburl=\"$this->fburl\",twurl=\"$this->twurl\",gpurl=\"$this->gpurl\",tumblr=\"$this->tumblr\",blogger=\"$this->blogger\",youtube=\"$this->youtube\",image=\"$this->image\",created_at=$this->created_at,is_public=$this->is_public,is_verified=$this->is_verified,about=\"$this->about\",mision=\"$this->mision\",vision=\"$this->vision\",founded_at=\"$this->founded_at\" where id=".$this->id;
		Executor::doit($sql);
	}
	public function getSubcategory(){
		return SubcategoryData::getById($this->subcategory_id);
	}

	public static function getByUID($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new DeckData();
		while($r = $query[0]->fetch_array()){
			$data->user = UserData::getById($r['user_id']);
			$data->title = $r['title'];
			$data->biografy = $r['biografy'];
			$data->skills = $r['skills'];
			$data->area = AreaData::getById($r['area_id']);
			$data->address = $r['address'];
			$data->country = CountryData::getById($r['country_id']);
			$data->latitud = $r['latitud'];
			$data->longitud = $r['longitud'];
			$data->phone = $r['phone'];
			$data->mail = $r['mail'];
			$data->website = $r['website'];
			$data->fburl = $r['fburl'];
			$data->twurl = $r['twurl'];
			$data->gpurl = $r['gpurl'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new DeckData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->user_id = $r['user_id'];
			$data->title = $r['title'];
			$data->image = $r['image'];

			$data->user_id = $r['user_id'];
			$data->subcategory_id = $r['subcategory_id'];
			$data->state_id = $r['state_id'];


			$data->biografy = $r['biografy'];
			$data->skills = $r['skills'];
			$data->address = $r['address'];

			$data->latitud = $r['latitud'];
			$data->longitud = $r['longitud'];
			$data->phone = $r['phone'];
			$data->mail = $r['mail'];
			$data->website = $r['website'];
			$data->fburl = $r['fburl'];
			$data->twurl = $r['twurl'];
			$data->gpurl = $r['gpurl'];
			$data->tumblr = $r['tumblr'];
			$data->blogger = $r['blogger'];
			$data->youtube = $r['youtube'];

			$data->about = $r['about'];
			$data->mision = $r['mision'];
			$data->vision = $r['vision'];
			$data->founded_at = $r['founded_at'];


			$found = $data;
			break;
		}
		return $found;
	}



	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new DeckData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nick = $r['nick'];
			$data->name = $r['name'];
			$data->mail = $r['mail'];
			$data->password = $r['password'];
			$data->usertype = UserTypedata::getById($r['usertype_id']);
			$data->status = StatusData::getById($r['status_id']);
			$data->is_admin = $r['is_admin'];
			$data->is_verified = $r['is_verified'];
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
			$array[$cnt] = new DeckData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->user = UserData::getById($r['user_id']);
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->biografy = $r['biografy'];
			$array[$cnt]->skills = $r['skills'];
			$array[$cnt]->area = AreaData::getById($r['area_id']);
			$array[$cnt]->address = $r['address'];
			$array[$cnt]->country = CountryData::getById($r['country_id']);
			$array[$cnt]->latitud = $r['latitud'];
			$array[$cnt]->longitud = $r['longitud'];
			$array[$cnt]->phone = $r['phone'];
			$array[$cnt]->website = $r['website'];
			$array[$cnt]->fburl = $r['fburl'];
			$array[$cnt]->twurl = $r['twurl'];
			$array[$cnt]->gpurl = $r['gpurl'];
			$array[$cnt]->image = $r['image'];
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
			$array[$cnt] = new DeckData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->user = UserData::getById($r['user_id']);
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->biografy = $r['biografy'];
			$array[$cnt]->skills = $r['skills'];
			$array[$cnt]->area = AreaData::getById($r['area_id']);
			$array[$cnt]->address = $r['address'];
			$array[$cnt]->country = CountryData::getById($r['country_id']);
			$array[$cnt]->latitud = $r['latitud'];
			$array[$cnt]->longitud = $r['longitud'];
			$array[$cnt]->phone = $r['phone'];
			$array[$cnt]->website = $r['website'];
			$array[$cnt]->fburl = $r['fburl'];
			$array[$cnt]->twurl = $r['twurl'];
			$array[$cnt]->gpurl = $r['gpurl'];
			$cnt++;
		}
		return $array;
	}

	public static function getAllRecent($limit){
if($limit==0){
		$sql = "select * from ".self::$tablename." order by id desc";
}else{
		$sql = "select * from ".self::$tablename." order by id desc limit $limit";
}
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DeckData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->biografy = $r['biografy'];
			$array[$cnt]->skills = $r['skills'];
			$array[$cnt]->address = $r['address'];

			$array[$cnt]->subcategory_id = $r['subcategory_id'];
			$array[$cnt]->state_id = $r['state_id'];
			$array[$cnt]->latitud = $r['latitud'];
			$array[$cnt]->longitud = $r['longitud'];
			$array[$cnt]->phone = $r['phone'];
			$array[$cnt]->website = $r['website'];
			$array[$cnt]->image = $r['image'];
			$array[$cnt]->fburl = $r['fburl'];
			$array[$cnt]->twurl = $r['twurl'];
			$array[$cnt]->gpurl = $r['gpurl'];
			$cnt++;
		}
		return $array;
	}


	public static function getSearch($q,$limit){
if($limit==0){
		$sql = "select * from ".self::$tablename." where title like '%$q%' order by id desc";
}else{
		$sql = "select * from ".self::$tablename." where title like '%$q%' order by id desc limit $limit";
}
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DeckData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->biografy = $r['biografy'];
			$array[$cnt]->skills = $r['skills'];
			$array[$cnt]->address = $r['address'];

			$array[$cnt]->subcategory_id = $r['subcategory_id'];
			$array[$cnt]->state_id = $r['state_id'];
			$array[$cnt]->latitud = $r['latitud'];
			$array[$cnt]->longitud = $r['longitud'];
			$array[$cnt]->phone = $r['phone'];
			$array[$cnt]->website = $r['website'];
			$array[$cnt]->image = $r['image'];
			$array[$cnt]->fburl = $r['fburl'];
			$array[$cnt]->twurl = $r['twurl'];
			$array[$cnt]->gpurl = $r['gpurl'];
			$cnt++;
		}
		return $array;
	}


	public static function getAllByUID($uid){
		$sql = "select * from ".self::$tablename." where user_id=$uid";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DeckData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->user = UserData::getById($r['user_id']);
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->biografy = $r['biografy'];
			$array[$cnt]->skills = $r['skills'];
			$array[$cnt]->address = $r['address'];
			$array[$cnt]->latitud = $r['latitud'];
			$array[$cnt]->subcategory_id = $r['subcategory_id'];
			$array[$cnt]->state_id = $r['state_id'];
			$array[$cnt]->longitud = $r['longitud'];
			$array[$cnt]->phone = $r['phone'];
			$array[$cnt]->website = $r['website'];
			$array[$cnt]->fburl = $r['fburl'];
			$array[$cnt]->twurl = $r['twurl'];
			$array[$cnt]->gpurl = $r['gpurl'];
			$cnt++;
		}
		return $array;
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or biografy like '%$q%' or skills like '%$q%' order by created_at desc";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DeckData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->user = UserData::getById($r['user_id']);
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->title = $r['title'];
			$array[$cnt]->biografy = $r['biografy'];
			$array[$cnt]->skills = $r['skills'];
			$array[$cnt]->area = AreaData::getById($r['area_id']);
			$array[$cnt]->address = $r['address'];
			$array[$cnt]->country = CountryData::getById($r['country_id']);
			$array[$cnt]->image = $r['image'];
			$array[$cnt]->latitud = $r['latitud'];
			$array[$cnt]->longitud = $r['longitud'];
			$array[$cnt]->phone = $r['phone'];
			$array[$cnt]->website = $r['website'];
			$array[$cnt]->fburl = $r['fburl'];
			$array[$cnt]->twurl = $r['twurl'];
			$array[$cnt]->gpurl = $r['gpurl'];
			$array[$cnt]->gpurl = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>