<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbre_sceance = null;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    private ?typemodule $Type_module_id = null;

    #[ORM\ManyToOne(inversedBy: 'module_id')]
    private ?ModuleCoach $module_id = null;

    #[ORM\OneToMany(mappedBy: 'id_module', targetEntity: Session::class)]
    private Collection $sessions;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNbreSceance(): ?int
    {
        return $this->nbre_sceance;
    }

    public function setNbreSceance(?int $nbre_sceance): self
    {
        $this->nbre_sceance = $nbre_sceance;

        return $this;
    }


    public function setTypeModuleId(?typemodule $Type_module_id): self
    {
        $this->Type_module_id = $Type_module_id;

        return $this;
    }

    public function getModuleId(): ?ModuleCoach
    {
        return $this->module_id;
    }

    public function setModuleId(?ModuleCoach $module_id): self
    {
        $this->module_id = $module_id;

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->setIdModule($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getIdModule() === $this) {
                $session->setIdModule(null);
            }
        }

        return $this;
    }






}

