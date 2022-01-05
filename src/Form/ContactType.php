<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       /* $builder
            ->add('fullName', TextType::class)
            ->add('fromEmail', EmailType::class)
            ->add('message', TextareaType::class)
        ;*/

        $builder
        ->add('name', TextType::class,[
            'row_attr' => ['class' => 'form-group'],
            'label' => 'Jméno a příjmení',
            'attr' => ['class' => 'form-control','placeholder' => 'Bilbo Pytlík'],
        ])
        ->add('tel', TelType::class,[
            'row_attr' => ['class' => 'form-group'],
            'label' => 'Telefon',
            'attr' => ['class' => 'form-control','placeholder' => '+420 123 456 789'],
        ])
        ->add('email', EmailType::class,[
            'row_attr' => ['class' => 'form-group'],
            'label' => 'Email',
            'attr' => ['class' => 'form-control','placeholder' => 'bilbo.pytlik@hobitin.cz'],
        ])
        ->add('zprava', TextareaType::class,[
            'row_attr' => ['class' => 'form-group'],
            'label' => 'Vaše zpráva',
            'attr' => ['class' => 'form-control','placeholder' => 'blabla blablabla blablablabla....','rows' => '10'],
        ])
        ->add('Odeslat', SubmitType::class,[
            'attr' => ['class' => 'btn btn-danger testtest'],
        ]);




    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
