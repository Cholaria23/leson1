<?php

include_once ROOT.'/models/News.php';

class NewsController
{

	public function actionIndex()
	{
		// echo 'Список новостей';
		$newsList = array();
		$newslist = News::getNewsList();
		
		// echo '<pre>';
		// print_r ($newslist);
		// echo '</pre>';

		require_once (ROOT.'\views\news\index.php');
		return true;
	}
	// public function actionView($category,$id)
	public function actionView($id)
	{	
		// echo 'Просмотр одной новости';
		// echo '<br>'.$id;
		$newsId = News::getNewsbyId($id);
		
		// echo '<br>'.$category;
		// echo '<pre>';
		// print_r ($newsId);
		// echo '</pre>';
		return true;
	}
	public function actionArchive()
	{
		echo 'Просмотр архива новостей';
		return true;
	}

}