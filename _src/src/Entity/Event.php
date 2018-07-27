<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @ORM\Table(name="events")
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
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="imageEventId", cascade={"all"}, orphanRemoval=true)
     */
    private $eventId;

    /**
     * @ORM\Column(name="event_name", type="string", length=255)
     *
     */
    private $eventName;

    public function __construct()
    {
        $this->eventId = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEventId(): Collection
    {
        return $this->eventId;
    }

    public function addEventId(Image $even): self
    {
        if (!$this->eventId->contains($even)) {
            $this->eventId[] = $even;
            $even->setImageEventId($this);
        }
        return $this;
    }

    public function removeEventId(Image $even): self
    {
        if ($this->eventId->contains($even)) {
            $this->eventId->removeElement($even);
            // set the owning side to null (unless already changed)
            if ($even->getImageEventId() === $this) {
                $even->setImageEventId(null);
            }
        }
        return $this;
    }

    public function getEventName()
    {
        return $this->eventName;
    }

    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
    }
}
