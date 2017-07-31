<?php
// src/Blogger/BlogBundle/Controller/BlogController.php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostsController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BlogBundle:Posts')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('BlogBundle:Comment')
               ->getCommentsForBlog($blog->getId());

        $draft = $blog->getDraft();
        //print_r($draft);exit;

        if ($draft == 1) {
            throw new NotFoundHttpException("Page not found");
        }
        else {
            return $this->render('BlogBundle:posts:show.html.twig', array(
                'blog'      => $blog,
                'comments'  => $comments
            ));
        }


    }
}
