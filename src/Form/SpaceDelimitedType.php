<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpaceDelimitedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addViewTransformer(new CallbackTransformer(
                function ($groupsAsArray) use ($options) {
                    return implode($options['delimiter'], $groupsAsArray);
                },
                function ($groupsAsString) use ($options) {
                    return explode($options['delimiter'], $groupsAsString);
                }
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('delimiter', ' ')
        ;
    }

    public function getParent(): ?string
    {
        return TextType::class;
    }
}
