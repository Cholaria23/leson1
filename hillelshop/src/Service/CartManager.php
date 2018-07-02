<?php

namespace App\Service;

use App\Repository\ProductRepository;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartManager 
{
	const SESSION_CART_ID = "cart";
	// protected static $instance = "cart";
	// private $session_start = FALSE;
	private $repository;
	private $product;
	private $qty;
	private $session;

	public function __construct(ProductRepository $repository,SessionInterface $session)
	{
		$this->repository = $repository;
		$this->session = $session;
	} 

	public function add(Product $id, int $quantity_input)
	{
	// 	if(isset($_SESSION['cart'][$id]))
	// 	{
 //        // если в массиве cart уже есть добавляемый товар
 //        $_SESSION['cart'][$id]['quantity_input'] += $quantity_input;
 //        return $_SESSION['cart'];
 //    	}else{
 //        // если товар кладется в корзину впервые
 //        $_SESSION['cart'][$id]['quantity_input'] = $quantity_input;
 //        return $_SESSION['cart'];
	// 	}
	// }
		if(isset($_SESSION[self::SESSION_CART_ID][$id->getId()]) && $_SESSION[self::SESSION_CART_ID] )
		{
			$_SESSION[self::SESSION_CART_ID][$id->getId()] += $quantity_input;
			
			return $_SESSION[self::SESSION_CART_ID];
		}

		$_SESSION[self::SESSION_CART_ID][$id->getId()] = $quantity_input;

		return $_SESSION[self::SESSION_CART_ID];
	
	}

	public function getCart() :array
	{
		// $_SESSION[self::SESSION_CART_ID];
		$result = [];

		if(!isset($_SESSION[self::SESSION_CART_ID]) || empty($_SESSION[self::SESSION_CART_ID]))
			{
				return $result;
			}
		foreach ($_SESSION[self::SESSION_CART_ID] as $id => $quantity_input) 
		{
			$position['quantity'] = $quantity_input;
			$position['product'] = $this->repository->find($id);
			$result[] = $position;
		}
		return $result;
	}

	 public function clearCart(Product $id)
    {   
        // if (defined($_SESSION[self::SESSION_CART_ID][$id->getId()])) 
        // {
            // unset($_SESSION[self::SESSION_CART_ID][$id]);
           
        // }
        unset($_SESSION[self::SESSION_CART_ID][$id->getId()]);
     return true;   
    }

	// public function getSession()
	// {
	// 	 // ? $_SESSION[self::SESSION_CART_ID] : array()
	// 	// return (null !== $_SESSION[self::SESSION_CART_ID]) ? $_SESSION[self::SESSION_CART_ID]: ($_SESSION[self::SESSION_CART_ID] = new Session());
	// 	return self::SESSION_CART_ID;
	// }

	
}