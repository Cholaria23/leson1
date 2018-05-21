<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MainController extends Controller
{

    /**
     * @Route("/", name="main")
     *
     */
    public function index()
    {

        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        return $this->render('main/index.html.twig', compact('posts','categories'));
    }

    /**
     * @Route("/article/{articleId}", name="article")
     */
    public function article($articleId)
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($articleId);
        return $this->render('main/article.html.twig', [
            'post' => $post,
        ]);
    }


}
