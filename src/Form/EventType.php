<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Image;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('eventName', TextType::class,
                [
                    'label' => 'Event'
                ])
//            ->add('events', EntityType::class,
//                [
//                    'class' => Event::class,
//                    'choice_label' => 'eventName',
//                    'query_builder' => function (EventRepository $repo) {
//                        return $repo->findAllEvents();
//                    }
//                ])
            ->add('images', CollectionType::class,
                [
                    'entry_type' => ImageType::class,
                    'label' => false,
//                    'entry_options' => array(
//                        'attr' => ['class' => 'form-group'],
//                    ),
//                    'allow_add' => true,
//                    'allow_delete' => true,
//                    'by_reference' => false,
//                    'data_class' => null,
//                    'prototype' => true,
//                    'by_reference' => false,
                    // each entry in the array will be a "gift" field
//                    'by_reference' => false,
//                    'by_reference' => false,
//                'entry_type' => ImageType::class,
                ])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
