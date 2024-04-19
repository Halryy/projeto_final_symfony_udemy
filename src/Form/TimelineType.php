<?php

namespace App\Form;

use App\Entity\Enum\LanguageEnum;
use App\Entity\Timeline;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TimelineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Ativo' => 1,
                    'Inativo' => 0
                ]
            ])
            ->add('position')
            ->add('language', ChoiceType::class, [
                'choices' => LanguageEnum::getOptions()
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Timeline::class,
        ]);
    }
}
