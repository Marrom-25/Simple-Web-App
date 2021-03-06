<?php
class Conn{

	protected $servername = "localhost";
	protected $username = "root";
	protected $password = "";
	protected $dbname = "amgi";

	public $_con;

	function __construct(){

		try{
			$this->_con = new PDO("mysql:host=". $this->servername .";dbname=". $this->dbname ."; ", $this->username, $this->password);
			$this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// return ['stat' => true, 'message' => 'Connected to DB'];
		}
		catch(PDOException $e){
			// return ['stat' => false, 'message' => 'Cant connect to DB!!', 'error' => $e];
			echo "CONNECTION ERROR : " . $e->getMessage();
		}

	}
}
?>