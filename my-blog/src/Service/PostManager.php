<?php

namespace App\Service;

use App\Repository\TagRepository;

class  PostManager
{

	private $repository;

	public function __construct(TagRepository $repository)
	{
		$this->repository = $repository;
	}

	public function toDo()
	{
		
		$tags = $this->getDoctrine()->getRepository(Tag::class)->findAll();
		return true;
	}

// *
//  * 
//  * @route ("/{categorySlug}/{postSlug}/savecomment", name = "comments")
//  * @ParamConverter("post", options={"mapping":{"postSlug":"slug"}})
//  * @ParamConverter("category", options={"mapping":{"categorySlug":"slug"}})
//  * @ParamConverter("comments", options={"mapping":{"commentId":"id"}})
//  * 
 

public function saveComment():Response
 {
     $entityManager = $this->getDoctrine()->getManager();

     $comment = new Comments();
 	 $comment->setComment($_POST['comments']);
     $comment -> setComment($_POST['comment']);
     $comment-> setEmail($_POST['email']);
     $comment-> setAuthor($_POST['author']);
     $comment-> setUrl($_POST['url']);
   

     $entityManager->persist($comment);

     $entityManager->flush();
     return new Response('Save coment'.$comment->getId());
 }
}
