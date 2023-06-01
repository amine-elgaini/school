<?php 
Trait Database {

	// db connection
	public static $db;

	//connect to db
	private function connect() {

		if (!static::$db) {
			$string = "mysql:host=localhost;dbname=school";
			$con = new PDO($string,'root','');
			return $con;
		}

		return static::$db;
	}

	//query execute
	public function query_execute($query, $data = []) {
		$con = $this->connect();
		$stm = $con->prepare($query);
		return $stm->execute(array_values($data));
	}

	//query info
	public function query_info($query, $data = [], $action = 'fetchAll') {
		$con = $this->connect();
		$stm = $con->prepare($query);
		$stm->execute(array_values($data));
		
    //choose between fetch or rowCount...
    $actions = ['fetch', 'fetchAll', 'rowCount'];
    if (in_array($action, $actions)) {
      return $stm->$action();
    }
    return 'error: wrong action';
	}

	
}