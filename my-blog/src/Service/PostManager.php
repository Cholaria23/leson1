<?php

namespace App\Service;

use App\Repository\TagRepository;
use App\Entity\Comments;
use App\Repository\CommentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;

class  PostManager
{

	private $tagRepository;
	private $commentRepository;
	private $formFactory;
	private $entityManager;

	public function __construct(EntityManagerInterface $entityManager,FormFactoryInterface $formFactory,CommentsRepository $commentRepository,TagRepository $tagRepository)
	{
		$this->tagRepository = $tagRepository;
		$this->formFactory = $formFactory;
		$this ->entityManager = $entityManager;
		$this ->commentRepository = $commentRepository;

	}

	// public function toDo()
	// {
		
	// 	$tags = $this->getDoctrine()->getRepository(Tag::class)->findAll();
	// 	return true;
	// }

// *
//  * 
//  * @route ("/{categorySlug}/{postSlug}/savecomment", name = "comments")
//  * @ParamConverter("post", options={"mapping":{"postSlug":"slug"}})
//  * @ParamConverter("category", options={"mapping":{"categorySlug":"slug"}})
//  * @ParamConverter("comments", options={"mapping":{"commentId":"id"}})
//  * 
 

// public function saveComment():Response
public function saveComment()
 {
     // dump($this->tagRepository);
     // dump ($this->entityManager);
     // dump($this->formFactory);
     // dump($this->commentRepository);
     // die;

     $comment = new Comments();
     // $form = $this->createForm(CommentsType::class, $comment);
     $form ->handleRequest($request);
     if ($form->isSubmitted() && $form->isValid())
     {
     	$entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($comment);
	    $entityManager->flush();

     }
 	 // $comment->setComment($_POST['comments']);
   //   $comment -> setComment($_POST['comment']);
   //   $comment-> setEmail($_POST['email']);
   //   $comment-> setAuthor($_POST['author']);
   //   $comment-> setUrl($_POST['url']);
   
     
     return new Response('Save coment'.$comment->getId());
 }
}
