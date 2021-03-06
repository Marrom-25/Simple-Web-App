<?php
require "./models/connection.php";

class Models extends Conn{
	function __construct(){
		parent::__construct();
	}
	
	public function view($dir, $htmlData = "", $data = []){
		include "./views/layouts/header.php";

		if(file_exists($dir)){
			include $dir;
		}

		include "./views/layouts/footer.php";
	}

	public function Read($table, $fields, $clause){
		try{
			$query = "SELECT ".$fields. " FROM ". $table ." " . $clause;
			$stmt = $this->_con->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchall(PDO::FETCH_ASSOC);

			return ['stat' => true, 'message' => 'success', 'datas' => $result];
		}
		catch(Exception $e){
			return ['stat' => false, 'message' => 'Error fetching data!', 'error' => $e];
		}

	}

	public function Create($table, $data){
		try{
			$setColumns = implode(',', array_keys($data));
            $setValues = implode(',', array_fill(0, count($data), '?'));
            $stmt = $this->_con->prepare("INSERT INTO $table ({$setColumns}) VALUES ({$setValues})");

            $stmt->execute(array_values($data));
	
			return ['stat' => true, 'message' => 'success'];
		}
		catch(Exception $e){
			return ['stat' => false, 'message' => 'Error creating data!', 'error' => $e];
		}
	}

	public function Delete($table, $clause){
		try{
			$query = "DELETE FROM ". $table ." " . $clause;
			$stmt = $this->_con->prepare($query);
			$stmt->execute();

			return ['stat' => true, 'message' => 'success'];
		}
		catch(Exception $e){
			return ['stat' => false, 'message' => 'Error deleting data!', 'error' => $e];
		}
	}

	public function Update($table, $data, $clause){
		try{
			$setString='';
	        $val=[];
	        foreach ($data as $key => $value) {
	          $val[':'.$key]=$value;
	          if (!$setString) {
	            $setString=$key.'=:'.$key;
	          } else {
	            $setString=$setString.', '.$key.'=:'.$key;
	          }
	        }

	         #$sqlString = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
	        $sqlString="UPDATE " . $table ." SET " . $setString . " WHERE " . $clause;
	        $stmt = $this->_con->prepare($sqlString);
	        $stmt->execute($val);

	        return ['stat' => true, 'message' => 'success'];

		}
		catch(Exception $e){
			return ['stat' => false, 'message' => 'Error updating data!', 'error' => $e];
		}
	}
}


?>