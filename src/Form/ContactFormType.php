<?php

namespace App\Form;

use App\FormValueObject\ContactData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'Jméno:',
            ])
            ->add('surname', TextType::class, [
                'required' => true,
                'label' => 'Příjmení:',
            ])
            ->add('phone', TextType::class, [
                'required' => false,
                'label' => 'Telefon:',
            ])
            ->add('mail', EmailType::class, [
                'required' => true,
                'label' => 'Mail:',
            ])
            ->add('note', TextareaType::class, [
                'required' => false,
                'attr' => ['maxlength' => 255],
                'label' => 'Poznámka:',
            ]);

        $builder
            ->add('save', SubmitType::class, [
                'label' => 'Uložit',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactData::class,
        ]);
    }
}
