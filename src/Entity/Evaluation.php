<?php

namespace App\Entity;

use App\Repository\EvaluationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvaluationRepository::class)]
class Evaluation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $duree = null;

    #[ORM\Column]
    private ?int $nbre_eva = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    private Collection $id_apprenant;

    #[ORM\OneToMany(mappedBy: 'id_evaluation', targetEntity: ApprenantModuleCoach::class)]
    private Collection $apprenantModuleCoaches;

    public function __construct()
    {
        $this->id_apprenant = new ArrayCollection();
        $this->apprenantModuleCoaches = new ArrayCollection();
    }


  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNbreEva(): ?int
    {
        return $this->nbre_eva;
    }

    public function setNbreEva(int $nbre_eva): self
    {
        $this->nbre_eva = $nbre_eva;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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
            $apprenantModuleCoach->setIdEvaluation($this);
        }

        return $this;
    }

    public function removeApprenantModuleCoach(ApprenantModuleCoach $apprenantModuleCoach): self
    {
        if ($this->apprenantModuleCoaches->removeElement($apprenantModuleCoach)) {
            // set the owning side to null (unless already changed)
            if ($apprenantModuleCoach->getIdEvaluation() === $this) {
                $apprenantModuleCoach->setIdEvaluation(null);
            }
        }

        return $this;
    }





  
}
