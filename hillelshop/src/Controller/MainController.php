<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
// use App\Entity\Category;
// use App\Entity\Product;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MainController extends Controller
{
        
     /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('Catalog/Contact/contact.html.twig');
        
    }

    
   /**
     * @Route("/product", name="product")
     */
    public function product()
    {
        return $this->render('Product/product.html.twig');
        
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

      
}
