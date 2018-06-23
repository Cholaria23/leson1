<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;


class CatalogController extends Controller
{
	// ProductsList
	/**
	 * @Route("/", name = "main")
	 * 
	 */
	
	 public function index(CategoryRepository $categoryRepository,ProductRepository $productRepository)
	{
		$categories = $categoryRepository ->getPopularCategories();
		$products = $productRepository->getLatestProduct();
		// dump($categories);
		// die;
		return $this->render('base/index.html.twig', compact("categories","products") );	
	}

    /**
     * @Route("/shop", name="shop")
     */
    public function catalog(ProductRepository $productRepository,Request $request)
    {	
    	$products = $productRepository->getLatestProduct();
    	
    	//create pagination
    	$paginator = $this->get('knp_paginator'); 
    	$products = $paginator ->paginate(
            $products,
            $request->query->getInt('page', 1),
            5
            // 1 /*page number*/,
            // 6 /*limit per page*/
        );
    	
    	$products->setTemplate("@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig");
    	

        return $this->render('catalog/shop/shop.html.twig',compact("products"));
    }

 /**
 * @Route("/home", name = "home")
 */
	 public function home()
	{
		return $this->render('base/index.html.twig');	
	}

	 /**
     * @Route("/shop_categories", name="shop_categories")
     */
	public function shop_categories(CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository -> findBy(array('sort_order' => 'null'));
        //$categories = $categoryRepository -> getTree();
        return $this->render('Catalog/category.html.twig',compact("category")); 
    }

    /**
     * @Route("/productsList", name="productsList")
     */
    public function productsList(ProductRepository $productRepository)
    {
    	$products = $productRepository->findAll();
    	return $this->render('Product/partial/products_list.html.twig', compact("products"));
    }
}
