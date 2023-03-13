<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ApprenantModuleCoachRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApprenantModuleCoachRepository::class)]
#[ApiResource]
class ApprenantModuleCoach
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'id_module_coach')]
    private ?ModuleCoach $apprenant_id = null;

    #[ORM\ManyToOne(inversedBy: 'apprenantModuleCoaches')]
    private ?Apprenant $id_apprenant = null;

    #[ORM\ManyToOne(inversedBy: 'apprenantModuleCoaches')]
    private ?evaluation $id_evaluation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApprenantId(): ?ModuleCoach
    {
        return $this->apprenant_id;
    }

    public function setApprenantId(?ModuleCoach $apprenant_id): self
    {
        $this->apprenant_id = $apprenant_id;

        return $this;
    }

    public function getIdApprenant(): ?Apprenant
    {
        return $this->id_apprenant;
    }

    public function setIdApprenant(?Apprenant $id_apprenant): self
    {
        $this->id_apprenant = $id_apprenant;

        return $this;
    }

    public function getIdEvaluation(): ?evaluation
    {
        return $this->id_evaluation;
    }

    public function setIdEvaluation(?evaluation $id_evaluation): self
    {
        $this->id_evaluation = $id_evaluation;

        return $this;
    }
}
