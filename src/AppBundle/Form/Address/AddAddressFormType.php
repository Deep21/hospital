<?php
/**
 * Created by PhpStorm.
 * User: Samfisher
 * Date: 25/12/2017
 * Time: 11:36
 */
namespace AppBundle\Form\Address;

use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddAddressFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address1', TextType::class)
            ->add('address2', TextType::class)
            ->add('postcode', NumberType::class)
            ->add('city', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Address'
        ));
    }

    /**
     * Get block prefix
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'address_type';
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

}