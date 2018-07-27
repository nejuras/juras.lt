<?php

namespace App\Controller;

use App\Form\ImageType;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\File;
use App\Entity\Image;
use App\Entity\Event;

class EventController extends Controller
{
    /**
     * @Route("/event/{slug}", name="event")
     */
    public function index($slug)
    {
        $event = $this->getDoctrine()
            ->getRepository(Event::class)
            ->findOneby(['id' => $slug]);

        $dir = $event->eventNameConverterToDir($event->getEventName());
//        var_dump($f);
        $data['url'] = '/uploads/images/'.$dir.'/';
        $data['eventName'] = '/uploads/images/'.$event->getEventName().'/';
//        $product = $this->getDoctrine()
//            ->getRepository(Image::class)
//            ->findOneByIdJoinedToCategory($slug);
//var_dump($product->getImages());
//        $category = $product->getImages();

//        $product->execute();
//var_dump($product);
        if (!$event) {
            throw $this->createNotFoundException(
                'No product found for id'
            );
        }

        return $this->render('photo/index.html.twig', [
            'data' => $data,
            'event' => $event,
        ]);
    }
}

