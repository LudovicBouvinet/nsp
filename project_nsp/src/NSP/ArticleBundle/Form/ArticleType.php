<?php

namespace NSP\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use NSP\ArticleBundle\Entity\ArticleRepository;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text')
            ->add('chapeau', 'text')
            ->add('save', 'submit')
        ;
       
    }
 
     /**
      * @param OptionsResolverInterface $resolver
      */
     public function setDefaultOptions(OptionsResolverInterface $resolver)
     {
         // $resolver->setDefaults(array(
         //     'data_class' => 'NSP\ArticleBundle\Entity\Article'
         // ));
     }

     /**
      * @return string
      */
     public function getName()
     {
         return 'nsp_articlebundle_article';
     }
}
