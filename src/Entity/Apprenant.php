<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ApprenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApprenantRepository::class)]
#[ApiResource]
class Apprenant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $pass = null;

    #[ORM\OneToMany(mappedBy: 'id_apprenant', targetEntity: ApprenantModuleCoach::class)]
    private Collection $apprenantModuleCoaches;

    public function __construct()
    {
        $this->apprenantModuleCoaches = new ArrayCollection();
    }

    #[ORM\ManyToOne(inversedBy: 'id_apprenant')]

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * @return Collection<int, ApprenantModuleCoach>
     */
    public function getApprenantModuleCoaches(): Collection
    {
        return $this->apprenantModuleCoaches;
    }

    public function addApprenantModuleCoach(ApprenantModuleCoach $apprenantModuleCoach): self
    {
        if (!$this->apprenantModuleCoaches->contains($apprenantModuleCoach)) {
            $this->apprenantModuleCoaches->add($apprenantModuleCoach);
            $apprenantModuleCoach->setIdApprenant($this);
        }

        return $this;
    }

    public function removeApprenantModuleCoach(ApprenantModuleCoach $apprenantModuleCoach): self
    {
        if ($this->apprenantModuleCoaches->removeElement($apprenantModuleCoach)) {
            // set the owning side to null (unless already changed)
            if ($apprenantModuleCoach->getIdApprenant() === $this) {
                $apprenantModuleCoach->setIdApprenant(null);
            }
        }

        return $this;
    }

}
