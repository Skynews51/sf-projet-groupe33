<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 03/12/2018
 * Time: 21:29
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Employes
 * @ORM\Table(name="employes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployesRepository")
 *
 */
class Employes
{
    //clé primaire
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;
    /**
     * @ORM\Column(type="string")
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", name="date_naissance")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="text")
     */
    private $adresse;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEmbauche;

    /**
     * @ORM\Column(type="string")
     */
    private $site;

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return mixed
     */
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    /**
     * @param mixed $dateEmbauche
     */
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }



    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



}





