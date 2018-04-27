<?php

class News 
{	
	// returns single news with specified id
	// @param integer $id
	public static function getNewsbyId($id)
	{
		// Запрос к БД
	}

	//  Возращает список новостей
	public static function getNewsList()
	{
		// Запрос к базе данных
		echo '<br>'.'+'.'<br>';
		$host = 'localhost';
		$dbname = 'my_db';
		$user = 'root';
		$password = '';
		$db = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
		
		// print_r($db);
		$newsList = array();

		 $result = $db->query('SELECT id, title, data, content,author FROM news ORDER BY data DESC LIMIT 6');
		$i = 0;
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['data'] = $row['data'];
			$newsList[$i]['content'] = $row['content'];
			// $newsList[$i]['image'] = $row['image'];
			$newsList[$i]['author'] = $row['author'];
			$i++;
		}
		// $db = null;
		return $newsList;
	}

}
// var_dump(news::getNewsList());