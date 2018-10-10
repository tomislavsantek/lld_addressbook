<?php

namespace AddressbookBundle\Form;

use AddressbookBundle\Entity\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname')
            ->add('lastname')
            ->add('address')
            ->add('zip')
            ->add('city')
            ->add('country')
            ->add('dob', DateType::class, [
                    'widget'    => 'choice',
                    'years'     => range(date('Y')-100, date('Y'))
                ])
            ->add('emails', CollectionType::class, [
                'entry_type' => EmailType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'attr' => array(
                    'class' => 'emails-selector',
                    )
                ])
            ->add('phones', CollectionType::class, [
                'entry_type' => PhoneType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'label' => "",
                'attr' => array(
                    'class' => 'phones-selector',
                    )
                ])

        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AddressbookBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'addressbookbundle_contact';
    }


}
