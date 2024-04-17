<?php

namespace App\Form;

use App\Entity\Banner;
use App\Entity\Enum\LanguageEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class BannerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('subtitle')
            ->add('active', ChoiceType::class, [
                'choices' => [
                    'Ativo' => 1,
                    'Inativo' => 0
                ]
            ])
            ->add('position')
            ->add('url')
            ->add('imageFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'asset_helper' => false,
                'download_uri' => false
            ])
            ->add('language', ChoiceType::class, [
                'choices' => LanguageEnum::getOptions()
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Banner::class,
        ]);
    }
}
