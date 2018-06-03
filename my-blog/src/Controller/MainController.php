<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Entity\Post;
use App\Entity\Category;
use App\Entity\Comments;
use Symfony\Component\Form;
use App\Repository\TagRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{

    /**
     * @Route("/", name="main")
     *
     */
    public function index()
    {
        $tags = $this->getDoctrine()->getRepository(Tag::class)->findAll();

        // $comments = $this->getDoctrine()->getRepository(Comments::class)->findAll();

       $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

     // $categories = new MyManager();
     // dump($categories->toDo());
     // die;
       // $categories = Category::where('parent_id', null)->get();
//       $categories->$this->object_to_array($categories);
//      var_dump($categories->getparent());
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
      
       return $this->render('main/index.html.twig', compact('posts','categories','tags'));
     
       // return $this->render('main/index.html.twig', ['controller_name' => 'MainController']);
//    
//    
//            return $this->render('main/index.html.twig', array('posts'=>$posts,'categories'=>$categories,'tags'=>$tags));
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
      * @Route("/{categorySlug}/{postSlug}/", name="show")
     * @ParamConverter("post", options={"mapping":{"postSlug":"slug"}})
     * @ParamConverter("category", options={"mapping":{"categorySlug":"slug"}})
      * //@ParamConverter("comment", options={"mapping":{"comment":"id"}})
      * //@ParamConverter("tag",options={"mapping":{"tagTitle":"title","tagTitle":"id"}})
     */
     
    
    public function show (Post $post, Category $category)
    {
        
        
        // $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
       
      // 
        return $this->render('main/article.html.twig', [
            'post' => $post, 'category' => $category
        ]);

//        return array(
//            'slug' => $slug,'post'=>$post,'category'=>$category,
//        );
    }

    
    public function tags(TagRepository $repository)
    
    {
        $tags = $repository->findAll();
        return $this->render('main/partial/tags.html.twig',compact('tags'));
    }


     /**
    * @Route("/tag/{tagTitle}", name="tag")
    * @ParamConverter("post", options={"mapping":{"postSlug":"slug"}})
    * @ParamConverter("tag",options={"mapping":{"tagTitle":"title"}})
    */
   public function tag(Tag $tag,Post $post)
   {
      
       return $this->render('main/partial/tag.html.twig', compact('tag','post'));
   }

   /**
    * @Route("/comment/{comment}", name="comment")
    * 
    * 
    */
   public function comment(Comments $comment)
   {
      
       return $this->render('main/partial/comment.html.twig', compact('comment'));
   }



}
