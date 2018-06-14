<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
// use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MainController extends Controller
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        // $categories = $categoryRepository -> findBy(array('sort_order' => 'null'));
        //$categories = $categoryRepository -> getTree();
        return $this->render('main/index.html.twig');
        
    }

     /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('Contact/contact.html.twig');
        
    }

       /**
     * @Route("/shop", name="shop")
     */
    public function shop()
    {
        return $this->render('Shop/shop.html.twig');
        
    }

        /**
     * @Route("/product", name="product")
     */
    public function product()
    {
        return $this->render('Product/product.html.twig');
        
    }

        /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        return $this->render('Blog/blog.html.twig');
        
    }

     /**
     * @Route("/blogsingle", name="blog_single")
     */
    public function blogsingle()
    {
        return $this->render('Blog/blog_single.html.twig');
        
    }

    /**
     * @Route("/regular", name="regular")
     */
    public function regular()
    {
        return $this->render('Regular/regular.html.twig');
        
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function cart()
    {
        return $this->render('Cart/cart.html.twig');
        
    }

     public function newsletter()
    {
        return $this->render('Newsletter/newsletter.html.twig');
        
    }
    
    public function header(CategoryRepository $categoryRepository)
    {
        // $categories = $categoryRepository -> findBy(array('sort_order' => 'null'));
         $categories = $categoryRepository -> getFirstLevelCategories();
         
        return $this->render('main/header.html.twig', compact ('categories'));   
    }

    /**
     * @Route("/category", name="showProductsCategory")
     * @ParamConverter("category", options={"mapping": {"category" = "name"}})
     * 
     */
    public function showProductsCategory(Category $category,ProductRepository $productRepository)
    {
    	$products = $productRepository -> getProductBrand();
    	return $this->render('main/header.html.twig', compact ('category','products')); 
    }
}
