<?php

namespace ProjetK\PretBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ObjetType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', 'text', array('label'=> 'Nom de l\'objet', 'required'=>true))
            ->add('type', 'text', array('label'=> 'Type d\'objet', 'required'=>true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjetK\PretBundle\Entity\Objet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetk_pretbundle_objet';
    }
}
