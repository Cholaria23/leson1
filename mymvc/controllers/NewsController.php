<?php

include_once ROOT.'/models/News.php';

class NewsController
{

	public function actionIndex()
	{
		echo 'Список новостей';
		$newsList = array();
		$newslist = News::getNewsList();
		
		echo '<pre>';
		print_r ($newslist);
		echo '</pre>';
		return true;
	}
	public function actionView($category,$id)
	{
		echo 'Просмотр одной новости';
		echo '<br>'.$category;
		echo '<br>'.$id;
		return true;
	}
	public function actionArchive()
	{
		echo 'Просмотр архива новостей';
		return true;
	}

}