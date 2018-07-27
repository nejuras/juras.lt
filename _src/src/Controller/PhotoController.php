<?php

namespace App\Controller;

use App\Entity\Image;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhotoController extends Controller
{
    /**
     * @Route("/photo/{slug}", name="photo")
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index($slug)
    {
        $product = $this->getDoctrine()->getRepository(Image::class)
            ->findby(['pavadinimas' => $slug]);
//        $product->execute();
//var_dump($product);
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id'
            );
        }

        return $this->render('photo/index.html.twig', [
            'data' => $product,
        ]);
    }
}
