<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ModuleCoachRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleCoachRepository::class)]
#[ApiResource]
class ModuleCoach
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'id_coach')]
    private ?coach $coach_id = null;

    #[ORM\OneToMany(mappedBy: 'module_id', targetEntity: module::class)]
    private Collection $module_id;

    #[ORM\OneToMany(mappedBy: 'apprenant_id', targetEntity: ApprenantModuleCoach::class)]
    private Collection $id_module_coach;

    public function __construct()
    {
        $this->module_id = new ArrayCollection();
        $this->id_module_coach = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoachId(): ?coach
    {
        return $this->coach_id;
    }

    public function setCoachId(?coach $coach_id): self
    {
        $this->coach_id = $coach_id;

        return $this;
    }

    /**
     * @return Collection<int, module>
     */
    public function getModuleId(): Collection
    {
        return $this->module_id;
    }

    public function addModuleId(module $moduleId): self
    {
        if (!$this->module_id->contains($moduleId)) {
            $this->module_id->add($moduleId);
            $moduleId->setModuleId($this);
        }

        return $this;
    }

    public function removeModuleId(module $moduleId): self
    {
        if ($this->module_id->removeElement($moduleId)) {
            // set the owning side to null (unless already changed)
            if ($moduleId->getModuleId() === $this) {
                $moduleId->setModuleId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ApprenantModuleCoach>
     */
    public function getIdModuleCoach(): Collection
    {
        return $this->id_module_coach;
    }

    public function addIdModuleCoach(ApprenantModuleCoach $idModuleCoach): self
    {
        if (!$this->id_module_coach->contains($idModuleCoach)) {
            $this->id_module_coach->add($idModuleCoach);
            $idModuleCoach->setApprenantId($this);
        }

        return $this;
    }

    public function removeIdModuleCoach(ApprenantModuleCoach $idModuleCoach): self
    {
        if ($this->id_module_coach->removeElement($idModuleCoach)) {
            // set the owning side to null (unless already changed)
            if ($idModuleCoach->getApprenantId() === $this) {
                $idModuleCoach->setApprenantId(null);
            }
        }

        return $this;
    }
}
