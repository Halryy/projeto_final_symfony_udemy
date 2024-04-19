<?php

namespace App\Form;

use App\Entity\Enum\LanguageEnum;
use App\Entity\WhoWeArePage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class WhoWeArePageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('presentationPart1')
            ->add('presentationPart2')
            ->add('presentationPart3')
            ->add('youtubeVideoCode')
            ->add('imageFile1', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'asset_helper' => false,
                'download_uri' => false
            ])
            ->add('imageFile2', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'asset_helper' => false,
                'download_uri' => false
            ])
            ->add('imageFile3', VichFileType::class, [
                'required' => false,
                'allow_delete' => false,
                'asset_helper' => false,
                'download_uri' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WhoWeArePage::class,
        ]);
    }
}
