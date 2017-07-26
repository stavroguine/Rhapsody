<?php

namespace BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticlesAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        // $formMapper
        // ->with('Author', array('class' => 'col-md-9'))
        // ->add('title', 'text')
        // ->add('blog', 'textarea')
        // ->end()
        // ->with('Content', array('class' => 'col-md-9'))
        // ->add('title', 'text')
        // ->add('blog', 'textarea')
        // ->end()
        // ->with('Category', array('class' => 'col-md-9'))
        // ->add('category', 'entity', array(
        //     'class' => 'BlogBundle\Entity\Category',
        //     'choice_label' => 'name',
        // ))
        // ->end()
        // ->with('Metadata', array('class' => 'col-md-9'))
        // ->add('draft')
        // ->add('created', 'datetime')
        // ->end()
        // ;
        $formMapper->add('title', 'text')
                   ->add('blog', 'text')
                   ->add('image', 'text')
                   ->add('author', 'text')
                   ->add('tags', 'text')
                   ->add('created', 'datetime');
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
