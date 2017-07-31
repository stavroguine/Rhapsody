<?php

namespace BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PostsAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text')
                   ->add('blog', 'text')
                   ->add('image', 'text', array('required' => false))
                   ->add('author', 'text')
                   ->add('tags', 'text')
                   ->add('created', 'datetime')
                   ->add('draft');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier('title')
        ->add('draft')
        ->add('created')
        ;
    }
}
