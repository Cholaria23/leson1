<?php

namespace App\Controller;

use App\Entity\Catalog;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/OneTech", name = "OneTech")
 */
class CatalogController extends Controller
{

/**
 * @Route("/home")
 */
	 public function home()
	{
		return $this->render('base/index.html.twig');	
	}

}