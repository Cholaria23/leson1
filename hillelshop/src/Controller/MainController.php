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
     * @Route("/regular", name="regular")
     */
    public function regular()
    {
        return $this->render('Regular/regular.html.twig');
        
    }
   
}
