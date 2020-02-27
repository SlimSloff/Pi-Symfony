<?php


namespace GestionCantineBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="commentaire")
 */

class Commentaire
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
    private $textcommentaire;


    /**
     * @ORM\Column(type="datetime")
     */
    private $datecommentaire;

    /**
     * @ORM\ManyToOne(targetEntity="GestionCantineBundle\Entity\Cantine")
     * @ORM\JoinColumn(name="id_cantine",referencedColumnName="id")
     */
    private $Cantine;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="id_user",referencedColumnName="id")
     */
    private $User;

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
    public function getTextcommentaire()
    {
        return $this->textcommentaire;
    }

    /**
     * @param mixed $textcommentaire
     */
    public function setTextcommentaire($textcommentaire)
    {
        $this->textcommentaire = $textcommentaire;
    }

    /**
     * @return mixed
     */
    public function getDatecommentaire()
    {
        return $this->datecommentaire;
    }

    /**
     * @param mixed $datecommentaire
     */
    public function setDatecommentaire($datecommentaire)
    {
        $this->datecommentaire = $datecommentaire;
    }


    public function getCantine()
    {
        return $this->Cantine;
    }

    /**
     * @param mixed $Cantine
     */
    public function setCantine($Cantine)
    {
        $this->Cantine = $Cantine;
    }

}