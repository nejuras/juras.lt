<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
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
    private $image;

//    private $file;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="images")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", nullable=false)
     */
    private $eventId;

    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Event|null
     */
    public function getEventId(): ?Event
    {
        return $this->eventId;
    }

//    /**
//     * @param Event|null $eventId
//     * @return Event
//     */
    public function setEventId(?Event $eventId): self
    {
        $this->eventId = $eventId;
        return $this;
    }
//    /**
//     * @return mixed
//     */
//    public function getFile()
//    {
//        return $this->file;
//    }
//
//    /**
//     * @param mixed $file
//     */
//    public function setFile(UploadedFile $file)
//    {
//        $this->file = $file;
//    }
//
//    public function getNewImage()
//    {
//        $this->image = $this->file->getClientOriginalName();
//    }
}
