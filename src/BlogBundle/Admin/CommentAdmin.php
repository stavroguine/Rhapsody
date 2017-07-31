<?php

namespace BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CommentAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('id', 'integer')
        ->add('blog_id', 'text')
        ->add('user', 'text')
        ->add('comment', 'text')
        ->add('created', 'datetime');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('id')
        ->add('blog_id')
        ->add('user')
        ->add('created');
    }
}
