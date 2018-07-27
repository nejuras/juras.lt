<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @ORM\Table(name="images")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var UploadedFile
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="eventId")
     * @ORM\JoinColumn(name="image_event_id", referencedColumnName="id", nullable=false)
     *
     */
    private $imageEventId;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    protected $imageName;

    public function getImageEventId(): ?Event
    {
        return $this->imageEventId;
    }

    public function setImageEventId(?Event $imageEventId): self
    {
        $this->imageEventId = $imageEventId;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }
}
