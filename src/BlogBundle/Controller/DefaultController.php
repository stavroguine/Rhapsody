<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()
           ->getEntityManager();

           $blogs = $em->getRepository('BlogBundle:Articles')
                    ->getLatestBlogs();

        return $this->render('BlogBundle::index.html.twig', array(
            'blogs' => $blogs
        ));
    }
}
