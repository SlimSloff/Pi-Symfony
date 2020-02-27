<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Enfant", mappedBy="parent")
     */
    private $enfants;

    public function __construct()
    {
        parent::__construct();
        $this->enfants = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getEnfants()
    {
        return $this->enfants;
    }

    /**
     * @param ArrayCollection $enfants
     */
    public function setEnfants($enfants)
    {
        $this->enfants = $enfants;
    }

    public function addEnfant($e)
    {
        $this->enfants->add($e);
    }
    public function removeEnfant($e)
    {
        $this->enfants->removeElement($e);
    }
}
