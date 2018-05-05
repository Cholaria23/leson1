<?php
namespace application\lib;

use PDO;

class Db 
{
	protected $db;

	public function __construct()
	{
		$config = require 'application/config/db.php';
		$this->db = new PDO("mysql:host=".$config["host"].";dbname=".$config['name'].'',$config['user'],$config['password']);
		// echo '+Db';

		// debug($config);
		// var_dump($db);
		// return $this->db;
	}
	
	public function query($sql,$params =[])
	{	//защита от sql иньекций
		// $query = $this->db->query($sql);
		$stmt = $this->db->prepare($sql,$params);
		if(!empty($params))
		{
			foreach ($params as $key => $val) {
				// echo "<p>".$key.'=>'.$val.'</p>';
				 $stmt->bindValue(':'.$key,$val);
			}
		}
		// exit;
		$stmt->execute();
		return $stmt;

		// $result = $query->fetchColumn();//Вывод результат запроса fetchColunm выводит только один столбец
		// debug($result);
		// return $query;
	}

	public function row($sql,$params =[])
	{
		$result = $this->query($sql,$params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql,$params =[])
	{
		$result = $this->query($sql,$params);
		return $result->fetchColumn();
	}
	
}