<?php

namespace App\Entity;

use App\Repository\AuthorisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuthorisationRepository::class)
 */
class Authorisation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $lecture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ecriture;

    /**
     * @ORM\OneToMany(targetEntity=Acces::class, mappedBy="AuthoID")
     */
    private $acces;

    public function __construct()
    {
        $this->acces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLecture(): ?bool
    {
        return $this->lecture;
    }

    public function setLecture(bool $lecture): self
    {
        $this->lecture = $lecture;

        return $this;
    }

    public function getEcriture(): ?bool
    {
        return $this->ecriture;
    }

    public function setEcriture(bool $ecriture): self
    {
        $this->ecriture = $ecriture;

        return $this;
    }

    /**
     * @return Collection|Acces[]
     */
    public function getAcces(): Collection
    {
        return $this->acces;
    }

    public function addAcce(Acces $acce): self
    {
        if (!$this->acces->contains($acce)) {
            $this->acces[] = $acce;
            $acce->setAuthoID($this);
        }

        return $this;
    }

    public function removeAcce(Acces $acce): self
    {
        if ($this->acces->removeElement($acce)) {
            // set the owning side to null (unless already changed)
            if ($acce->getAuthoID() === $this) {
                $acce->setAuthoID(null);
            }
        }

        return $this;
    }
}
