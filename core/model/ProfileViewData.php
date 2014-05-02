<?php


class DeckViewData {
	public static $tablename = "deckview";
	public function DeckViewData(){
		$this->viewer_id = "";
		$this->deck_id = "";
		$this->realip = "";
		$this->created_at = "";
	}

	public function add(){
		// $sql = "insert into user (viewer_id,deck_id,created_at,realip) ";
		// $sql .= "value ($this->viewer_id,$this->deck_id,$this->created_at,$this->realip)";

/////////////////////////////////
	if(Session::getUID()!=""){
		if(!$this->verify()){
			$sql = "insert into ".self::$tablename." (viewer_id,deck_id,created_at,realip) ";
			$sql .= "value ($this->viewer_id,$this->deck_id,$this->created_at,\"$this->realip\")";
			Executor::doit($sql);
		// return $con->insert_id;
		return true;
		}
	}else {
		return false;
	}

/////////////////////////////////
	}

public static function countByProfileId($deck_id){
	$sql = "select count(*) from ".self::$tablename." where deck_id=$deck_id";
	$q = Executor::doit($sql);
	$r = $q[0]->fetch_array();
	return $r[0];// print_r($r);	
}

public function verify(){
	$con = Database::getCon();
	$sql = "select * from ".self::$tablename." where realip=\"".IpLogger::getRealIP()."\" and viewer_id=".Session::getUID()." and deck_id=$this->deck_id";
	$query = $con->query($sql);
	$found=false;
	$ca = "" ;
	while($r=$query->fetch_array()){
		$found = true ;
		$ca = $r['created_at'];
	}

	if($found==true){
		$ca2 = $ca + (24)*3600;
		if(time()>=$ca2){
			$found=false;
		}
	}
	return $found;
}



	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto DeckViewData previamente utilizamos el contexto
	public function update(){
	}
	public function getDeck(){
		return DeckData::getById($this->deck_id);
	}
	public static function getAll(){
		$sql = "select *,count(*) as total from ".self::$tablename." group by deck_id order by total desc limit 5";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DeckViewData();
			$array[$cnt]->deck_id = $r['deck_id'];
			$array[$cnt]->total = $r['total'];
			$cnt++;
		}
		return $array;
	}


/*	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new DeckViewData();
		while($r = $query->fetch_array()){
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


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new DeckViewData();
		while($r = $query->fetch_array()){
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
		while($r = $query->fetch_array()){
			$array[$cnt] = new DeckViewData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nick = $r['nick'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->mail = $r['mail'];
			$array[$cnt]->password = $r['password'];
			$array[$cnt]->usertype_id = UserTypeData::getById($r['usertype_id']);
			$array[$cnt]->status_id = StatusData::getById($r['status_id']);
			$array[$cnt]->is_admin = $r['is_admin'];
			$array[$cnt]->is_verified = $r['is_verified'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}
*/
}

?>