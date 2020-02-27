<?php

namespace GestionCantineBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="reclamation")
 */

class Reclamation
{
   /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(type="string",length=255) 
     */
    private $sujetreclamation;

    /**
     * @ORM\Column(type="text")
     */
    private $textreclamation;


    /**
     * @ORM\Column(type="datetime")
     */
    private $datereclamation;
    /**
     * @ORM\Column(type="boolean")
     */
    private $traiter;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id")
     */
    private $User;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return mixed
     */
    public function getSujetreclamation()
    {
        return $this->sujetreclamation;
    }

    /**
     * @param mixed $sujetreclamation
     */
    public function setSujetreclamation($sujetreclamation)
    {
        $this->sujetreclamation = $sujetreclamation;
    }

    /**
     * @return mixed
     */
    public function getTextreclamation()
    {
        return $this->textreclamation;
    }

    /**
     * @param mixed $textreclamation
     */
    public function setTextreclamation($textreclamation)
    {
        $this->textreclamation = $textreclamation;
    }

    /**
     * @return mixed
     */
    public function getDatereclamation()
    {
        return $this->datereclamation;
    }

    /**
     * @param mixed $datereclamation
     */
    public function setDatereclamation($datereclamation)
    {
        $this->datereclamation = $datereclamation;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @param mixed $User
     */
    public function setUser($User)
    {
        $this->User = $User;
    }

    /**
     * @return mixed
     */
    public function getTraiter()
    {
        return $this->traiter;
    }

    /**
     * @param mixed $traiter
     */
    public function setTraiter($traiter)
    {
        $this->traiter = $traiter;
    }


}

