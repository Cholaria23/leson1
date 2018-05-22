<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\Post;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class MainController extends Controller
{

    /**
     * @Route("/", name="main")
     *
     */
    public function index()
    {
        $tags = $this->getDoctrine()->getRepository(Tag::class)->findAll();


       $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
//       $categories=new Category();
//       $categories->$this->object_to_array($categories);
//      var_dump($categories->getparent());
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
       return $this->render('main/index.html.twig', compact('posts','categories','tags'));
//        return $this->render('main/index.html.twig', array('posts'=>$posts,'categories'=>$categories,'tags'=>$tags));
    }

//    /**
//     * @Route("/article/{articleId}", name="article")
//     */
//    public function article($articleId)
//    {
//        $post = $this->getDoctrine()->getRepository(Post::class)->find($articleId);
//        return $this->render('main/article.html.twig', [
//            'post' => $post,
//        ]);
//    }

    /**
     *@Route("/show/{slug}", name="show")
    *@Method("GET")
     *@ParamConverter(name = "slug")
     *@Template ("main/article.html.twig")
     */
    public function show(Post $slug)
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($slug);
        return $this->render('main/article.html.twig', [
            'post' => $post,
        ]);

//        return array(
//            'slug' => $slug,'post'=>$post,'category'=>$category,
//        );
    }

}
