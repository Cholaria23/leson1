<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
  /**
     * @Route("/blog_single", name="blog_single")
     */
    public function blogsingle()
    {
        return $this->render('blog/blog_single.html.twig');
        
    }

   /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        return $this->render('blog/blog.html.twig');
        
    }

    public function blogpost()
    {
    	return $this->render ('blog/partial/blogpost.html.twig');
    }

    public function parallax()
    {
    	return $this->render('blog/partial/parallax.html.twig');
    }
}
