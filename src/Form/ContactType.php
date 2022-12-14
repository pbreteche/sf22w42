<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', null, [
                'constraints' => [
                    new Email(['message' => 'validé directement depuis le formulaire']),
                    new Callback(function ($value, ExecutionContextInterface $context) {
                        if (1 == 1) {
                            $context->buildViolation('dumb validation')
                                ->addViolation();
                        }
                    }),
                ],
            ])
            ->add('groupNames', null, [
                'delimiter' => "\n",
            ])
            ->add('demo-autocomplete', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Paris' => 'par',
                    'Palaiseau' => 'pal',
                    'Nanterre' => 'nat',
                    'Nancy' => 'nac',
                    'Nantes' => 'nte',
                    'Namur' => 'nmu',
                ],
                'autocomplete' => true,
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
