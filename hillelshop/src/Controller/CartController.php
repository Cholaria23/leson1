<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;
use App\Entity\Cart;
use App\Repository\ProductRepository;
use App\Repository\CartRepository;
use App\Service\CartManager;

class CartController extends Controller
{
    
     /**
     * @Route("/cart", name="cart")
     */
    public function cart()
    {
    	dump($_SESSION);
    	$cm =$this->get(CartManager::class);
        return $this->render('Cart/cart.html.twig',['cart'=>$cm->getCart()]);
        
    }

    /**
     * @Route("/cart/add/{id}", name="add_cart", methods="GET|POST")
     */
    public function addToCart(Request $request,Product $id)
    {	
        $cm = $this->get(CartManager::class);
         // $quantity_input = $request->get("quantity_input");
        $cm->add($id,$request->get("quantity_input"));

        return $this->redirectToRoute('cart');
    }
}
