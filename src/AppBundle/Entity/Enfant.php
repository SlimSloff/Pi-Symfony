<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enfant
 *
 * @ORM\Table(name="enfant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnfantRepository")
 */
class Enfant
{
    /**
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
     * @ORM\Column(name="Prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
    * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Event", mappedBy="participants")
    */
    private $eventsParticipes;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="enfants")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

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
     * @return Enfant
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Enfant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getEventsParticipes()
    {
        return $this->eventsParticipes;
    }

    /**
     * @param mixed $eventsParticipes
     */
    public function setEventsParticipes($eventsParticipes)
    {
        $this->eventsParticipes = $eventsParticipes;
    }

    public function addEventParticipes($e)
    {
        $this->eventsParticipes->add($e);
    }
    public function removeEventParticipes($e)
    {
        $this->eventsParticipes->removeElement($e);
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function __toString()
    {
        return $this->getNom();
    }


}
