<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
	public function getNews()
	{
		echo 'Main:Model';
		// var_dump($this->db->row());
		// $result = $this->db->row("SELECT id,title FROM news");
		// debug ($result);
		// return $result;
	}
}