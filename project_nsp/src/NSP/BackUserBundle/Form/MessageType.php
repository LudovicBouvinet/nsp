<?php

namespace NSP\BackUserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use NSP\ArticleBundle\Entity\Message;
use Symfony\Component\Validator\Constraints\Date;

class MessageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objet', 'text')
            ->add('corps', 'textarea')
            ->add('destinataireName', 'text')
            ->add('save', 'submit')
        ;
       
    }
 
     /**
      * @param OptionsResolverInterface $resolver
      */
     public function setDefaultOptions(OptionsResolverInterface $resolver)
     {
         $resolver->setDefaults(array(
             'data_class' => 'NSP\ArticleBundle\Entity\Message'
         ));
     }

     /**
      * @return string
      */
     public function getName()
     {
         return 'nsp_backuserbundle_message';
     }
}
