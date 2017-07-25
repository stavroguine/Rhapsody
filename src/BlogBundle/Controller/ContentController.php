<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlogBundle\Entity\Enquiry;
use BlogBundle\Entity\EnquiryType;
use Symfony\Component\HttpFoundation\Request;
class ContentController extends Controller
{
    public function aboutAction()
    {
        return $this->render('BlogBundle:content:about.html.twig');
    }

    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(EnquiryType::class, $enquiry);

        if ($request->isMethod('POST')) {

            if ($form->handleRequest($request)->isValid()) {
                $message = \Swift_Message::newInstance()
                ->setSubject('Message du site de Franz Liszt')
                ->setFrom('liszt@blacklab.com')
                ->setTo($this->container->getParameter('rhapsody.emails.contact_email'))
                ->setBody($this->renderView('BlogBundle:content:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->add('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');
                return $this->redirect($this->generateUrl('BlogBundle_contact'));
            }
        }

        return $this->render('BlogBundle:content:contact.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function sidebarAction()
    {
        $em = $this->getDoctrine()
        ->getEntityManager();

        $tags = $em->getRepository('BlogBundle:Articles')
        ->getTags();

        $tagWeights = $em->getRepository('BlogBundle:Articles')
        ->getTagWeights($tags);

        return $this->render('BlogBundle:content:sidebar.html.twig', array(
            'tags' => $tagWeights
        ));
    }

    public function translationAction($name)
{
  return $this->render('BlogBundle:content:translation.html.twig', array(
    'name' => $name
  ));
}
}
