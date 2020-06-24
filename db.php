<?php 
echo <<<START
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
		<title>test</title>
	</head>
	<body>
START;

class db {

	private $host,$db,$user,$pass,$conn,$query,$qResults,$qData;

	function __construct($host, $db, $user, $pass = ''){
		$this->host = $host;
		$this->db = $db;
		$this->user = $user;
		$this->pass = $pass;

	} 

	public function connect(){
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
		if($this->conn->connect_error){
			die("Db Connection Failed ". $this->conn->connect_error);
		}
		// echo 'DB Connected';
	}

	public function runQuery($query){
		$this->query = $query;
		$this->qResults = $this->conn->query($this->query);
	} 

	public function fetchResults(){
		$this->qData = $this->qResults->fetch_all(MYSQLI_ASSOC);
	}

	public function dumpResults($title=''){
		echo "<div class='container' style='border:1px solid red;'><h3>$title</h3><table class='table table table-condensed'>";
		foreach($this->qData as $key => $data){
			echo '<tr>';
			if(is_array($data)){
				foreach($data as $k => $d){
					echo '<td>'.$d.'</td>';
				}
				echo '</tr>';
			}else{
				echo '<tr><td>'.$data.'</td></tr>';
			}
			// echo '<pre>'.var_export($this->qData, true).'</pre>';

		}
		echo '</table></div><br/><br/>';
		// var_dump($this->qData);
	}

	public function debug(){
		var_dump($this->conn->error);
	}

}

//daily data
//monthly data
//yearly data
// $query = "CREATE TABLE IF NOT EXISTS daily (
// 	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
// 	dt DATE DEFAULT CURDATE() UNIQUE,
// 	inbound_goal INT DEFAULT 100,
// 	outbound_goal INT DEFAULT 10,
// 	inbound DECIMAL(10, 2) DEFAULT 0,
// 	outbound DECIMAL(10, 2) DEFAULT 0,
// 	fajr BOOLEAN DEFAULT FALSE,
// 	duhr BOOLEAN DEFAULT FALSE,
// 	asr BOOLEAN DEFAULT FALSE,
// 	maghrib BOOLEAN DEFAULT FALSE,
// 	isha BOOLEAN DEFAULT FALSE,
// 	quran_ayat_memorized INT(3) DEFAULT 0,
// 	duties JSON,
// 	pushups_goal INT DEFAULT 100,
// 	pushups INT DEFAULT 0,
// 	current_task VARCHAR(255),
// 	current_task_time VARCHAR(50),
// 	next_task VARCHAR(50),
// 	tasks TINYTEXT,
// 	smoke_free BOOLEAN DEFAULT FALSE,
// 	gaze_lowered BOOLEAN DEFAULT FALSE,
// )";
// $query = "ALTER TABLE daily ADD (smoke_free BOOLEAN DEFAULT FALSE, gaze_lowered BOOLEAN DEFAULT FALSE)";

// try {
	// $results = $conn->query($query);
	// if($results){
	// 	// var_dump($results);
	// }else{
	// 	// var_dump($conn->error);
	// }
// }catch (Exception $e){
// }
		// $rows = $results->fetch_all(MYSQLI_ASSOC);
		// $json = json_encode($rows);

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];
// try {
//      $pdo = new PDO($dsn, $user, $pass, $options);
// } catch (\PDOException $e) {
//      throw new \PDOException($e->getMessage(), (int)$e->getCode());
// }

?>