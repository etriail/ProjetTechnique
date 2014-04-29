<?php

namespace ProjetK\PretBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TransactionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        	$builder->add(
                'emprunteur', 
                'entity',
                array(
                    'class' => 'ProjetKUserBundle:User',
                    'label' => 'Prêter à',
                    'property' => 'username',
                    'required' => true))
            ->add('date_pret', 'date', array('label'=> 'Date du prêt', 'required'=>true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjetK\PretBundle\Entity\Transaction'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'projetk_pretbundle_transaction';
    }
}
