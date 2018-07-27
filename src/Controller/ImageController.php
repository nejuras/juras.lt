<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Filesystem\;
use App\Entity\Image;
use App\Entity\Event;
use App\Form\ImageType;
use App\Form\EventType;

class ImageController extends Controller
{
    /**
     * @Route("/image", name="image")
     */
    public function index(Request $request)
    {
        $event = new Event();

        $event->addImage(new Image());

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
//            /** @var $file UploadedFile */
//            $file = $image->getImage();
            /**
             * @var $event Event
             */
//            $event = $form->getData();
//            $files = $form->get('images')->getData();
//            $image->setImage('dsc_88888.jpg');
//            echo '<br>';
//            print_r($event->getImages());
//            $files = $event->getEventName();
////            $image = new Image($event);
//            var_dump($files);
//            echo '<br>';
//            echo '<br>';
//            echo '<br>';
//            foreach ($files as $file) {
//
////    var_dump($file->getImage());
//                $at = $file->getImage();
////                $at->guessExtension();
//                var_dump($at);
//                echo '<br>';
//                echo '<br>';
//                echo '<br>';


//            $files = $event->getImages());
//            var_dump($event);
//            var_dump($files);
//            foreach ($files as $file) {
//                $newDir = $event->getEventName();
//                $newImageName = $this->generateUniqueFileName() . '.' . $files->guessExtension();
//                $this->resize_image($files, 1000, 1000, false, $newImageName, $newDir);

//                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

            var_dump($event);


                // moves the file to the directory where brochures are stored
//                if (!is_dir('uploads/images/' . $createDir)) {
//                    mkdir('uploads/images/' . $createDir, 0700);
//                }
//                $file->move(
//                    $this->getParameter('image_directory') . '/' . $createDir,
//                    $fileName
//                );

                // updates the 'brochure' property to store the PDF file name
                // instead of its contents
//                $entityManager = $this->getDoctrine()->getManager();
//                $entityManager->persist($event);
//                $entityManager->flush();
                $em = $this->getDoctrine()->getManager();
                $em->persist($event);
                $em->flush();


//            }
        }

//      }      return $this->redirect($this->generateUrl('app_product_list'));
//        }
        return $this->render('image/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    public function resize_image($file, $w, $h, $crop = false, $image, $dir)
    {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }
        $imagePath = $this->getParameter('image_directory') . '/' . $dir . '/' . $image;
//        $imagePath = $this->getParameter('image_directory') . '/' . $dir . '/' . $this->generateUniqueFileName() . image_type_to_extension(IMAGETYPE_JPEG);

        $src = imagecreatefromjpeg($file);
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        if (!is_dir('uploads/images/' . $dir)) {
            mkdir('uploads/images/' . $dir, 0700);
        }
        imagejpeg($dst, $imagePath, 75);

        return $dst;
    }
}