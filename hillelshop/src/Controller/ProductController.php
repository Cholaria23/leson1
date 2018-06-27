<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\ProductImage;
use App\Repository\ProductImageRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class ProductController extends Controller
{
    /**
     * @Route("/product/{id}", name="product")
     *  //@ParamConverter("product", options={"mapping": {"productId":"id"}})
     */
    
    public function index(ProductRepository $productRepository,$id)
    {
    	// $product = $this->getDoctrine()
     //    ->getRepository(Product::class)
     //    ->findOneById($id);
           $product = $productRepository ->findProductById($id);
        return $this->render('product/product.html.twig',compact('product'));
    }

     /**
     * //@Route("product/{id}", name="productId")
     * 
     */
    
    // public function productId(Product $id,ProductRepository $productRepository)
    // {
    //     // $product = $productRepository ->find($id);
    //     $product = $this->getDoctrine()
    //     ->getRepository(Product::class)
    //     ->find($id);
    //     return $this->render('product/single_product.html.twig',compact("product"));
    // }

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
