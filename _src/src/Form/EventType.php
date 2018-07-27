<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Event;
use App\Repository\ImageRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EventType extends AbstractType
{
    /**
     * @Route("/upload/images", name="upload")
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eventName', TextType::class)
//            ->add('eventId', EntityType::class, [
//                'class' => ImageType::class,
////                'allow_add' => true,
////                'allow_delete'=> true,
////                'by_reference' => false,
//            ])
            ->add('eventId', ImageType::class, array('data_class' => null))
//            ->add('esamas', EntityType::class,
//                [
//                    'class' => Image::class,
//                    'choice_label' => 'pavadinimas',
//                    'query_builder' => function (ImageRepository $repo) {
//                        return $repo->findAllPavadinimas();
//                    }
//                ])
            ->add('save', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Event::class,
        ));
    }
}
