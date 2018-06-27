<?php

namespace App\Service;

use App\Repository\ProductRepository;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CartManager 
{
	const SESSION_CART_ID = "cart";
	// protected static $instance = "cart";
	// private $session_start = FALSE;
	private $repository;
	private $product;
	private $qty;

	public function __construct(ProductRepository $repository)
	{
		$this->repository = $repository;
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
		if($_SESSION[self::SESSION_CART_ID] && isset($_SESSION[self::SESSION_CART_ID][$id->getId()]))
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

	// public function getSession()
	// {
	// 	 // ? $_SESSION[self::SESSION_CART_ID] : array()
	// 	// return (null !== $_SESSION[self::SESSION_CART_ID]) ? $_SESSION[self::SESSION_CART_ID]: ($_SESSION[self::SESSION_CART_ID] = new Session());
	// 	return self::SESSION_CART_ID;
	// }

	// /**
 //     * функция старта сессии
 //     * @return Возращает true если сессия стартовала успешно
 //     */
 //    public function start()
 //    {
 //        if($this->session_start){
 //            return true;
 //        }
 //        if(!session_start()){
 //            throw new Exception('Error session start');
 //        }
 //        $this->session_start = true;
 //        return true;
 //    }
}