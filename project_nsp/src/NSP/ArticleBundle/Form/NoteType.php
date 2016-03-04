
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
            ->add('note', 'choice', array(
            'choices' => array(
                '1' => 'Notez 1',
                '2' => 'Notez 2',
                '3' => 'Notez 3',
                '4' => 'Notez 4',
                '5' => 'Notez 5',
            )))
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
    public function getName()
    {
        return 'nsp_articlebundle_UtilisateurArticle';
    }

}