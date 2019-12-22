<?php

namespace FormsBundle\Form\Ejemplo2;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use FormsBundle\Entity\Ejemplo2\Localidad;

class LocalidadType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      //dump($options);exit;
        $builder
      //    ->add('departamento', DepartamentoType::class, array(
            //'by_reference' => true
      //    ));
          ->add('nombre');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            //'data_class' => Localidad::class,
            'class' => Localidad::class,
            'compound' => true,
            'empty_data' => null
        ));
    }

    public function getParent(){
      return EntityType::class;
    }

}
