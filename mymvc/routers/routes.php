<?php 
return array (
	
	'news/([0-9]+)' => 'news/view',// actionView в NewsController
	// 'news/77' => 'news/view',
	// ЧПУ
// http://test2/news/sport/1235
	'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',

	'news' => 'news/index', // actionIndex в NewsController

	'article' => 'article/list', // actionList в ArticleController
 );