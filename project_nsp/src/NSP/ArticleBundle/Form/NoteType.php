<?php

namespace NSP\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class NoteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note', 'select')
            ->add('save', 'submit')
        ;
    }

 
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
       $resolver->setDefaults(array(
        'data_class' => 'NSP\ArticleBundle\Entity\UtilisateurArticle'
      ));
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return 'nsp_articlebundle_note';
    }
}