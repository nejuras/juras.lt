<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eventName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="eventId", cascade={"all"}, orphanRemoval=true)
     */
    private $images;

//    private $events;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

//    /**
//     * {@inheritdoc}
//     */
//    public function __toString()
//    {
//        return (string) $this->getTitle();
//
//    }

    public function getId()
    {
        return $this->id;
    }

    public function getEventName(): ?string
    {
        return $this->eventName;
    }

    public function setEventName(string $eventName): self
    {
        $this->eventName = $eventName;

        return $this;
    }

//    public function getEvents(): ?string
//    {
//        return $this->eventName;
//    }
//
//    public function setEvents(string $events): self
//    {
//        $this->eventName = $events;
//
//        return $this;
//    }

//    /**
//     * @return Collection|Image[]
//     */
    public function getImages(): Collection
    {
        return $this->images;
    }

//    public function setImages($images)
//    {
//        $this->images = $images;
//        return $this;
//    }

    public function addImage(Image $img): void
    {
//        $this->images[] = $img;
        if (!$this->images->contains($img)) {
            $this->images->add($img);
            $img->setEventId($this);
        }
    }
//    public function addup(UploadedFile $img): void
//    {
////        $this->images[] = $img;
//        if (!$this->images->contains($img)) {
//            $this->images->add($img);
//        }
//    }
//    public function removeGift(Gift $gift): void
//    {
//        if ($this->gifts->contains($gift)) {
//            $this->gifts->removeElement($gift);
//            $gift->setGiftList(null);
//        }
//    }

    public function eventNameConverterToDir($string)
    {
        $words = explode(" ", $string);
        $letters = "";
        foreach ($words as $value) {
            $letters .= substr($value, 0, 1);
        }
        return $letters;
    }
}
