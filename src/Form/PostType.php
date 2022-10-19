<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\PostStateEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('body')
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $form = $event->getForm();
                /** @var Post $post */
                $post = $event->getData();

                if (PostStateEnum::draft == $post->getState()) {
                    $form
                        ->add('title', null, [
                            'priority' => 50,
                        ])
                        ->add('state', EnumType::class, [
                            'class' => PostStateEnum::class,
                            'choice_label' => function ($choice, $key, $value) {
                                return 'post_state_enum.'.$value;
                            },
                        ])
                    ;
                }
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
