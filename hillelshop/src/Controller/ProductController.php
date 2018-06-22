<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        return $this->render('product/product.html.twig');
    }

     /**
     * @Route("/category_header", name="category_header")
     */
    public function category_header(CategoryRepository $categoryRepository)
    {
    	$categories = $categoryRepository -> getFirstLevelCategories();
    	return $this->render('Product/category.html.twig', compact ('categories'));
    }

    /**
     * @Route("/showProductsCategory", name="showProductsCategory")
     * @ParamConverter("category", options={"mapping": {"category" = "name"}})
     * 
     */
    public function showProductsCategory(Category $category,ProductRepository $productRepository)
    {
    	$products = $productRepository -> getProductBrand();
    	return $this->render('base/header.html.twig', compact ('category','products')); 
    }
}
