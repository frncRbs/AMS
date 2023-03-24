<?php

Class Connection{
	private $server = "mysql:host=".HOST.";dbname=".DATABASE_NAME;
	private $username = DATABASE_USERNAME;
	private $password = DATABASE_PASSWORD;
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;

	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
    }

	public function close(){
   		$this->conn = null;
 	}

	// public function insert_data($table_name, $array_data){
	// 	$db = $this->open();
	// 	try {
	// 		$data_keys = array_keys($array_data);
	// 		$fields = implode(', ', $data_keys);

	// 		$array_values = [];
	// 		foreach($data_keys as $key => $value){
	// 			$array_values[$key] = ':'.$value;
	// 		}

	// 		$values = implode(', ', $array_values);
	// 		$sql = $db->prepare("INSERT INTO $table_name (". $fields  .") VALUES (". $values .")");

	// 		// Bind
	// 		foreach($array_data as $key => $value){
	// 			$sql->bindParam($array_values[$key], $value[$key]);
	// 		}

	// 		$return_value = 'true';
	// 		($sql->execute()) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot save record.';

	// 	} catch (PDOException $e) {
	// 		$return_value = $e->getMessage();
	// 		echo $return_value;
	// 	}

	// 	$this->close();
	// 	return $return_value;
	// }

}
?>