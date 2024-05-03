<?php

namespace App\Form;

use App\Entity\News;
use App\Entity\NewsImage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('alt')
            ->add('image')
            ->add('imgUpdatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('news', EntityType::class, [
                'class' => News::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NewsImage::class,
        ]);
    }
}
