<?php

namespace GestionCantineBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="cantine")
 */

class Cantine
{
   /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @ORM\Column(type="text") 
     */
    private $descriptioncantine;

     /**
     * @ORM\Column(type="string",length=255) 
     */
    private $jourcantine;

    /**
     * @ORM\Column(type="string",length=255) 
     */
    private $sceance;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDescriptioncantine()
    {
        return $this->descriptioncantine;
    }

    /**
     * @param mixed $descriptioncantine
     */
    public function setDescriptioncantine($descriptioncantine)
    {
        $this->descriptioncantine = $descriptioncantine;
    }

    /**
     * @return mixed
     */
    public function getJourcantine()
    {
        return $this->jourcantine;
    }

    /**
     * @param mixed $jourcantine
     */
    public function setJourcantine($jourcantine)
    {
        $this->jourcantine = $jourcantine;
    }

    /**
     * @return mixed
     */
    public function getSceance()
    {
        return $this->sceance;
    }

    /**
     * @param mixed $sceance
     */
    public function setSceance($sceance)
    {
        $this->sceance = $sceance;
    }


}

