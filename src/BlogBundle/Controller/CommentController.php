<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Comment;
use BlogBundle\Form\CommentType;

/**
* Comment controller.
*/
class CommentController extends Controller
{
    public function newAction($blog_id)
    {
        $blog = $this->getBlog($blog_id);

        $comment = new Comment();
        $comment->setBlog($blog);
        $form = $this->createForm(CommentType::class,  $comment);

        return $this->render('BlogBundle:posts:form-new.html.twig', array(
            'comment' => $comment,
            'form'   => $form->createView()
        ));
    }

    public function createAction(Request $request, $blog_id)
    {
        $blog = $this->getBlog($blog_id);

        $comment  = new Comment();
        $comment->setBlog($blog);

        //$form    = $this->createForm(new CommentType(), $comment);
        $form = $this->createForm(CommentType::class,  $comment);
        //$form->bindRequest($request);

        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()
            ->getEntityManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('BlogBundle_blog_show', array(
                'id' => $comment->getBlog()->getId())) .
                '#comment-' . $comment->getId()
            );
        }

        return $this->render('BlogBundle:posts:form-create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));
    }

    protected function getBlog($blog_id)
    {
        $em = $this->getDoctrine()
        ->getEntityManager();

        $blog = $em->getRepository('BlogBundle:Posts')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }

}
