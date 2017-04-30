<?php

namespace BlogBundle\Entity;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email');
        $builder->add('subject');
        $builder->add('body');
    }

//     public function setDefaultOptions(OptionsResolverInterface $resolver)
// {
//     $resolver->setDefaults(array(
//         'data_class' => 'BlogBundle\Entity\Enquiry'
//     ));
// }

    public function getName()
    {
        return 'contact';
    }
}
