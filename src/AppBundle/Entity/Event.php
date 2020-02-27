<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Event
 * @Vich\Uploadable
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_heure_event", type="datetime", nullable=false)
     */
    private $dateHeureEvent;

    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Enfant")
     * @ORM\JoinTable(name="event_enfant",
     *   joinColumns={
     *     @ORM\JoinColumn(name="event_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="enfant_id", referencedColumnName="id")
     *   }
     * )
     */
    private $participants;

    /**
     * @Vich\UploadableField(mapping="evt_cover", fileNameProperty="cover")
     *
     * @var File
     */
    private $evtCover;

    /**
     * @ORM\Column(name="cover", type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $cover;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     *
     * @var \DateTime
     */
    private $coverUpdatedAt;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Event
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateHeureEvent
     *
     * @param \DateTime $dateHeureEvent
     *
     * @return Event
     */
    public function setDateHeureEvent($dateHeureEvent)
    {
        $this->dateHeureEvent = $dateHeureEvent;

        return $this;
    }

    /**
     * Get dateHeureEvent
     *
     * @return \DateTime
     */
    public function getDateHeureEvent()
    {
        return $this->dateHeureEvent;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }
    /**
     * @param \Doctrine\Common\Collections\Collection $participants
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }
    public function addParticipant(Enfant $user)
    {
        $this->participants->add($user);
    }
    public function removeParticipant(Enfant $user)
    {
        $this->participants->removeElement($user);
    }

    public function __toString()
    {
        return $this->getNom();
    }



    /**
     * @return File
     */
    public function getEvtCover()
    {
        return $this->evtCover;
    }

    /**
     * @param File $evtCover
     */
    public function setEvtCover($evtCover)
    {
        $this->evtCover = $evtCover;
    }

    /**
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return \DateTime
     */
    public function getCoverUpdatedAt()
    {
        return $this->coverUpdatedAt;
    }

    /**
     * @param \DateTime $coverUpdatedAt
     */
    public function setCoverUpdatedAt($coverUpdatedAt)
    {
        $this->coverUpdatedAt = $coverUpdatedAt;
    }


}
