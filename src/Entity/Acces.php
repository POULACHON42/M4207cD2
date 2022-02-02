<?php

namespace App\Entity;

use App\Repository\AccesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccesRepository::class)
 */
class Acces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $UtilisateurId;

    /**
     * @ORM\Column(type="integer")
     */
    private $AuthorisationId;

    /**
     * @ORM\Column(type="integer")
     */
    private $Documentid;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="a")
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserID;

    /**
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Fich;

    /**
     * @ORM\ManyToOne(targetEntity=Authorisation::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $AuthoID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurId(): ?int
    {
        return $this->UtilisateurId;
    }

    public function setUtilisateurId(int $UtilisateurId): self
    {
        $this->UtilisateurId = $UtilisateurId;

        return $this;
    }

    public function getAuthorisationId(): ?int
    {
        return $this->AuthorisationId;
    }

    public function setAuthorisationId(int $AuthorisationId): self
    {
        $this->AuthorisationId = $AuthorisationId;

        return $this;
    }

    public function getDocumentid(): ?int
    {
        return $this->Documentid;
    }

    public function setDocumentid(int $Documentid): self
    {
        $this->Documentid = $Documentid;

        return $this;
    }

    public function getUserID(): ?Utilisateur
    {
        return $this->UserID;
    }

    public function setUserID(?Utilisateur $UserID): self
    {
        $this->UserID = $UserID;

        return $this;
    }

    public function getFich(): ?Document
    {
        return $this->Fich;
    }

    public function setFich(?Document $Fich): self
    {
        $this->Fich = $Fich;

        return $this;
    }

    public function getAuthoID(): ?Authorisation
    {
        return $this->AuthoID;
    }

    public function setAuthoID(?Authorisation $AuthoID): self
    {
        $this->AuthoID = $AuthoID;

        return $this;
    }
}
