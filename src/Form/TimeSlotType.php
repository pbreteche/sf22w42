<?php

namespace App\Form;

use App\Utils\DataType\TimeSlot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimeSlotType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
            ])
            ->add('from', TimeType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
            ])
            ->add('to', TimeType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
            ])
            ->setDataMapper($this);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('all_day', false);
        $resolver->setAllowedTypes('all_day', 'bool');
    }

    /**
     * Maintenant, le mapper par défaut ne trouverait les différents setters.
     * On en crée un pour passer les données via le constructeur.
     */
    public function mapDataToForms(mixed $viewData, \Traversable $forms)
    {
        if (null === $viewData) {
            return;
        }

        if (!$viewData instanceof TimeSlot) {
            throw new UnexpectedTypeException($viewData, TimeSlot::class);
        }

        $forms = iterator_to_array($forms);

        $forms['date']->setData($viewData->getDate());
        $forms['from']->setData($viewData->getFrom());
        $forms['to']->setData($viewData->getTo());
    }

    public function mapFormsToData(\Traversable $forms, mixed &$viewData)
    {
        $forms = iterator_to_array($forms);

        $viewData = new TimeSlot(
            $forms['date']->getData(),
            $forms['from']->getData(),
            $forms['to']->getData()
        );
    }
}
